@extends('layouts.app')
@section('nav_section')
    <section id="hero-section-primary">
        <div class="hero-layer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 hero-section-text">
                        <h1>
                            Your Contribution <br>
                            Their Brighter Future
                        </h1>
                        <form action="{{ route('frontend.events') }}">
                            <input type="search" class="form-control" name="search"
                                style="width:40%; margin:0 auto; height:50px; text-align:center; font-size:18px;"
                                placeholder="Search for your donations events"
                                value="{{ request()->search ?? old('search', '') }}">
                        </form>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex align-items-center justify-content-between m-auto">
                                <a class="primary-button primary-button-lg" href="{{ route('register') }}">Join Us Now</a>
                                <a class="primary-button-outline primary-button-lg"
                                    href="{{ route('frontend.about') }}">Learn More</a>
                            </div>
                        </div>

                        <div class="row py-5 mt-4 hero-footer">
                            <div class="col-md-4">
                                <div class="icon">
                                    <i class="fi fi-rr-calendar-day"></i>
                                </div>
                                <div class="text-box">
                                    120 + Events Completed
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon">
                                    <i class="fi fi-rr-hands-heart"></i>
                                </div>
                                <div class="text-box">
                                    1200 + Volunteers around in the world
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon">
                                    <i class="fi fi-rr-calendar-day"></i>
                                </div>
                                <div class="text-box">
                                    30 + Countries Included
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section id="about-us" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About Mahadan</h1>
                </div>
                <div class="col-md-12">
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere debitis error, assumenda recusandae
                        nihil iusto incidunt quaerat, rerum ratione aliquid pariatur qui. Voluptate modi quaerat quos soluta
                        ipsum rerum accusamus?. Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis magnam
                        eum eos excepturi. Modi temporibus aliquid repellat, hic id amet in, repellendus possimus accusamus
                        deleniti velit, molestias praesentium veniam omnis.
                    </p>
                </div>
                <div class="col-md-12">
                    <div class="embed-responsive embed-responsive-21by9">
                        <iframe width="100%" height="500"
                            src="https://www.youtube.com/embed/MG3jGHnBVQs?si=N1ayheHx-mHdTUYs" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="events" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-3">
                    <h1>Our Donation Causes and Events</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ $event->getDisplayImage() }}" class="card-img-top" alt="{{ $event->title }}">
                            <div class="card-body">
                                <h3 class="card-title">{{ $event->title }}</h3>
                                <h5 class="card-title"><span class="badge bg-primary">{{ $event->category->name }}</span>
                                </h5>
                                <div class="money-raised my-2">
                                    <span class="font-weight-1000"><strong>
                                            {{ $event->formatAmount($event->amount_raised) }}
                                            Raised / {{ $event->target_amount }}</strong></span>
                                </div>
                                <p class="card-text" style="font-size: 15px; color:#111;">{!! Str::words($event->description, 20, '...') !!}</p>
                                <div class="d-grid">
                                    <a href="{{ route('frontend.event', $event->id) }}"
                                        class="primary-button text-center">View
                                        More</a>


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="events" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-3">
                    <h1>Our Blogs and News</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $event)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ $event->getDisplayImage() }}" class="card-img-top" alt="{{ $event->title }}">
                            <div class="card-body">
                                <h3 class="card-title">{{ $event->title }}</h3>
                                <p class="card-text" style="font-size: 15px; color:#111;">{!! Str::words($event->description, 20, '...') !!}</p>
                                <div class="d-grid">
                                    <a href="{{ route('frontend.blog', $event->id) }}"
                                        class="primary-button text-center">View
                                        More</a>


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
