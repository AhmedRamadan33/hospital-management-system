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
                                    <h2>The Medical <br> Specialists</h2>

                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{ URL::asset('WebSite/images/cliniva_healthcare_homedoctor.png') }}"
                                            alt="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="team-section">
        <div class="auto-container">

            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>The Medical Specialists</h2>
                <div class="separator"></div>
            </div>
            <div class="row clearfix">
                <!-- Team Block -->
                @foreach ($doctors as $doctor)
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="images/resource/team-1.jpg" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">Make Appointment</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">Dr. {{$doctor->name}}</a></h3>
                            <div class="designation">{{$doctor->section->name}} Specialist</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
