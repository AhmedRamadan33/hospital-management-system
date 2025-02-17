@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
Edit driver
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Edit driver Name: <span class="text-success tx-20 mb-0"> {{$driver->name}}</span> </h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.layouts.messages_notif')
<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route('driver.update',$driver->id)}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-3">
                            <label> Name</label>
                            <input type="text" name="name"  value="{{$driver->name}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-3">
                            <label> Phone</label>
                            <input type="tel" name="phone" value="{{$driver->phone}}" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-3">
                            <label> License Type</label>
                            <input type="text" name="license_type"  value="{{$driver->license_type}}" class="form-control @error('license_type') is-invalid @enderror">
                            @error('license_type')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-3">
                            <label> License Number</label>
                            <input type="number" name="license_number"  value="{{$driver->license_number}}" class="form-control @error('license_number') is-invalid @enderror">
                            @error('license_number')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label> Status </label>
                            <input name="status" {{$driver->status == 1 ? 'checked' : ''}} value="{{$driver->status}}" type="checkbox" class="form-check-input ml-1" id="exampleCheck1">
                            @error('status')<div class="alert alert-danger">{{ $message }}</div>@enderror

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success"> Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
