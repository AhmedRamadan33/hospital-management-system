@extends('WebSite.layouts.master')

@section('content')
    <section class="main-slider-three">
        <div class="banner-carousel">
            <!-- Swiper -->
            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <div class="auto-container">
                        <div class="row clearfix">

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2>Make <br> Appointments</h2>

                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{ URL::asset('WebSite/images/cliniva_healthcare_homedoctor.png') }}" alt="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="appointment-section-two mt-5">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{URL::asset('WebSite/images/solen-feyissa-6kevOTcUYw8-unsplash.jpg')}}" alt=""/>
                            </div>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>Appointment Form</h2>
                                <div class="separator"></div>
                            </div>

                            <!-- Appointment Form -->
                            <div class="appointment-form">
                               @livewire('appointments.create')
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
