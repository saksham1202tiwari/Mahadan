@extends('layouts.app')

@section('nav_section')
    <section id="hero-section-secondary">
        <div class="hero-layer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 hero-section-text">
                        <h1>
                            {{ $event->title }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section id="event" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-3">
                    <h1>{{ $event->title }}</h1>
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
                    <img src="{{ $event->getDisplayImage() }}" alt="{{ $event->title }}" width="100%" height="500px">
                </div>

            </div>
            <div class="row py-5">
                <div class="col-md-8">
                    <div class="amount mb-4">
                        <h2 class="text-primary">Amount Raised : <span class="text-success">Rs.
                                {{ $event->amount_raised }}</span> Out of
                            <span class="text-danger"> {{ $event->target_amount }}</span>
                        </h2>
                    </div>
                    <p>
                        {!! $event->description !!}
                    </p>

                    <h4>Total Donations: {{ $event->donations->count() }}</h4>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Donation Box
                        </div>
                        <div class="card-body">
                            <form action="{{ route('frontend.donate', $event->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="donor_name">Donor Name</label>
                                    <input type="text" placeholder="Donor Name" class="form-control" name="name"
                                        value="{{ auth()->check() ? auth()->user()->name : '' }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="amount">Amount (Rs.)</label>
                                    <input type="number" placeholder="Amount" class="form-control" name="amount"
                                        id="amount">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="payment_method">Payment Method</label>
                                    <select name="payment_method" id="payment_method" class="form-control">
                                        <option value="esewa">Esewa</option>
                                        {{-- <option value="khalti">Khalti</option> --}}
                                    </select>
                                </div>

                                <div class="d-grid">
                                    <button class="primary-button">Confirm Donation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Comments and Reviews</h3>
                </div>
                <div class="col-md-12">
                    <x-comments :model="$event" />

                </div>
            </div>
        </div>
    </section>
@endsection
