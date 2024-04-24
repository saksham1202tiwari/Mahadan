@extends('layouts.app')

@section('nav_section')
    <section id="hero-section-secondary">
        <div class="hero-layer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 hero-section-text">
                        <h1>
                            Our Blogs
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
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
