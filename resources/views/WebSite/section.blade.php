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
                                    <h2>Health <br> Department</h2>

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
    <section class="department-section-three">
        <div class="image-layer" style="background-image:url(images/background/6.jpg)"></div>
        <div class="auto-container">
            <!-- Department Tabs-->
            <div class="department-tabs tabs-box">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <!-- Sec Title -->
                        <div class="sec-title light">
                            <h2>Health <br> Department</h2>
                            <div class="separator"></div>
                        </div>
                        <!--Tab Btns-->
                        <ul class="tab-btns tab-buttons clearfix">
                            @foreach ($sections as $section)
                            <li data-tab="#tab-{{$section->name}}" class="tab-btn {{$section->name =='Orthopedic' ? 'active-btn' : ''}}">{{$section->name}} Department</li>
                            @endforeach
                        </ul>
                    </div>
                    <!--Column-->
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <!--Tabs Container-->
                        <div class="tabs-content">

                            @foreach ($sections as $section)
                            <div class="tab {{$section->name =='Orthopedic' ? 'active-tab' : ''}}" id="tab-{{$section->name}}">
                                <div class="content">
                                    <h2>{{$section->name}} Department</h2>
                                    <div class="title">Department of {{$section->name}}</div>
                                    <div class="text">
                                        <p>{{$section->description}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Tab -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
