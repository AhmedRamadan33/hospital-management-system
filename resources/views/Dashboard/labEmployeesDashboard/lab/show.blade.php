@extends('Dashboard.layouts.master')
@section('title')
 show Lab

@stop
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Analysis result Attachments</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ {{$lab->patient->name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="form-group">
        <label for="exampleFormControlTextarea1"> Analysis result</label>
        <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3">{{$lab->description_employee}}</textarea>
    </div>

    <!-- Gallery -->
    <div class="demo-gallery">
        <ul id="lightgallery" class="list-unstyled row row-sm pr-0">

            @foreach($lab->images as $image)

                <li class="col-sm-6 col-lg-4" data-responsive="{{URL::asset('Dashboard/img/lab/'.$image->fileName)}}" data-src="{{URL::asset('Dashboard/img/lab/'.$image->fileName)}}">
                    <a href="#">
                        <img width="50px" height="300px" class="img-responsive" src="{{URL::asset('Dashboard/img/lab/'.$image->fileName)}}" alt="NoImg">
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
