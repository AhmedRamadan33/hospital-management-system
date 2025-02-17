@extends('Dashboard.layouts.master')
@section('title')
 show Ray

@stop
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Ray Attachments</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ {{$ray->patient->name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="form-group">
        <label for="exampleFormControlTextarea1"> Radiologist's notes</label>
        <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3">{{$ray->description_employee}}</textarea>
    </div>

    <!-- Gallery -->
    <div class="demo-gallery">
        <ul id="lightgallery" class="list-unstyled row row-sm pr-0">

            @foreach($ray->images as $image)

                <li class="col-sm-6 col-lg-4" data-responsive="{{URL::asset('Dashboard/img/rays/'.$image->fileName)}}" data-src="{{URL::asset('Dashboard/img/rays/'.$image->fileName)}}">
                    <a href="#">
                        <img width="50px" height="300px" class="img-responsive" src="{{URL::asset('Dashboard/img/rays/'.$image->fileName)}}" alt="NoImg">
                    </a>
                </li>
            @endforeach
        </ul>
        <!-- /Gallery -->

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

@endsection
@section('js')


@endsection
