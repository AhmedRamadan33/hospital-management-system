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
                                    <h2>Our Services</h2>
                                    <div class="text">Hospitals are vital institutions within any healthcare system,
                                        playing a central role in providing specialized and emergency medical care to
                                        patients. The services offered by hospitals are diverse, encompassing a wide range
                                        of medical and surgical specialties, making them comprehensive centers for
                                        treatment, diagnosis, and disease prevention. In this article, we will explore the
                                        key services provided by hospitals and their importance in enhancing individual and
                                        community health.</div>
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

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center my-5">Services</h2>
                </div>
                @foreach ($services as $service)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="card-title">{{ $service->name }}</h3>
                                <h6 class="card-text">{{ $service->section->name }}</h6>
                                <p class="card-text">{{ $service->description }}</p>
                                <span class="card-text">{{ $service->price }} </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <h2 class="text-center my-5">Offered Services</h2>
                </div>
                @foreach ($offeredServices as $service)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="card-title">{{ $service->name }}</h3>
                                <span class="card-text">Before Discount : {{ $service->before_discount }}</span>
                                <p class="card-text">Total : {{ $service->total }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
