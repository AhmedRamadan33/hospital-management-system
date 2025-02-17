@extends('Dashboard.layouts.master')
@section('title')
Add the ray result
@stop
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> ray result : <span class="text-success tx-20 mb-0">{{ $ray->patient->name }}</span></h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.layouts.messages_alert')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('rayEmp.update',$ray->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-5">
                            <label for="exampleFormControlTextarea1">rays result</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description_employee" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Attachments </label>
                            <input class="form-control" type="file" name="photos[]" accept="image/*" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
