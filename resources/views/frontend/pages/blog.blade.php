@extends('layouts.app')

@section('nav_section')
    <section id="hero-section-secondary">
        <div class="hero-layer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 hero-section-text">
                        <h1>
                            {{ $blog->title }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section id="blog" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-3">
                    <h1>{{ $blog->title }}</h1>
                </div>
                @if ($message = Session::get('success') || ($message = Session::get('error')))
                    <div class="col-md-12 my-2">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @endif
                    </div>
                @endif
                <div class="col-md-12">
                    <img src="{{ $blog->getDisplayImage() }}" alt="{{ $blog->title }}" width="100%" height="500px">
                </div>

            </div>
            <div class="row py-5">
                <div class="col-md-10">
                    <p>
                        {!! $blog->description !!}
                    </p>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Comments and Reviews</h3>
                </div>
                <div class="col-md-12">
                    <x-comments :model="$blog" />

                </div>
            </div>
        </div>
    </section>
@endsection
