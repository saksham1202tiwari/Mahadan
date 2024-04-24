@extends('layouts.app')

@section('nav_section')
    <section id="hero-section-secondary">
        <div class="hero-layer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 hero-section-text">
                        <h1>
                            Contact Us
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Contact Section Start -->
    <div id="contact">
        <div class="container">
            <div class="section-header">
                <h2>Contact</h2>
                <p>
                    Contact us to get the best stay deal for yourself inside pokhara valley
                </p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row contact-info">
                        <div class="col-md-4">
                            <div class="info-item">
                                <p><i class="fi fi-rr-map-marker"></i>Pokhara 8, Nepal</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-item">
                                <p><i class="fi fi-rr-envelope"></i><a href="mailto:admin@admin.com">admin@admin.com</a></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-item">
                                <p>
                                    <i class="fi fi-sr-phone-flip"></i><a href="tel:1234567890">1234567890</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="contact-form">
                        @if ($message = Session::get('success'))
                            <div class="row">
                                <div class="col-md-12 my-3">
                                    <div class="alert alert-success">
                                        {{ $message }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="row">
                                <div class="col-md-12 my-3">
                                    <div class="alert alert-success">
                                        {{ $message }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="#" id="contactForm" novalidate="novalidate" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Your Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="E.g. John Sina"
                                        required="required" data-validation-required-message="Please enter your name"
                                        name="name" />

                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="email" placeholder="E.g. 98***"
                                        required="required" data-validation-required-message="Please enter your phone"
                                        name="phone" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label>Subject</label>
                                <input type="text" class="form-control" id="subject"
                                    placeholder="E.g. Donation in cash" required="required"
                                    data-validation-required-message="Please enter a subject" name="subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <label>Message</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="E.g. I need a to how to donate"
                                    required="required" data-validation-required-message="Please enter your message" name="message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="button"><button type="submit" id="sendMessageButton">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->
@endsection
