@extends('Dashboard.layouts.master')
@section('css')
     <!--Internal   Notify -->
     <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
Add a new driver
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ Add a new driver</span>
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
                <form action="{{route('driver.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-3">
                            <label> Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-3">
                            <label> Phone</label>
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')<div class="alert alert-danger">{{ $message }}</div>@enderror

                        </div>
                        <div class="col-3">
                            <label>  Driver license Type</label>
                            <input type="text" name="license_type"  class="form-control @error('license_type') is-invalid @enderror">
                            @error('license_type')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-3">
                            <label>  Driver license Number</label>
                            <input type="number" name="license_number"  class="form-control @error('license_number') is-invalid @enderror">
                            @error('license_number')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success">Save </button>
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
