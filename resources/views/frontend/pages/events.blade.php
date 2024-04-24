@extends('layouts.app')

@section('nav_section')
    <section id="hero-section-secondary">
        <div class="hero-layer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 hero-section-text">
                        <h1>
                            Our Donation Events
                        </h1>

                        <form action="{{ route('frontend.events') }}">
                            <select name="category_id" id="category_id" class="form-control mb-2"
                                style="width:40%; margin:0 auto; height:50px; text-align:center; font-size:18px;">
                                <option value="">All</option>
                                @foreach (App\Models\Category::all() as $category)
                                    <option
                                        value="{{ $category->id }}"{{ $category->id == request()->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input type="search" class="form-control" name="search"
                                style="width:40%; margin:0 auto; height:50px; text-align:center; font-size:18px;"
                                placeholder="Search for your donations events"
                                value="{{ request()->search ?? old('search', '') }}">
                        </form>
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
@endsection
