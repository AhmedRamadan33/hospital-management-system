@extends('Dashboard.layouts.master')
@section('css')
     <!--Internal   Notify -->
     <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
Add a new ambulance
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ Add a new ambulance</span>
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
                <form action="{{route('ambulance.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label>Car Number</label>
                            <input type="text" name="car_number"  value="{{old('car_number')}}" class="form-control @error('car_number') is-invalid @enderror">
                            @error('car_number')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col">
                            <label>Car Model</label>
                            <input type="text" name="car_model"  value="{{old('car_model')}}" class="form-control @error('car_model') is-invalid @enderror">
                            @error('car_model')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col">
                            <label> Car Year Made</label>
                            <input type="number" name="car_year_made"  value="{{old('car_year_made')}}" class="form-control @error('car_year_made') is-invalid @enderror">
                            @error('car_year_made')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col">
                            <label>car Type </label>
                            <select class="form-control" name="car_type">
                                <option value="1">Private</option>
                                <option value="2">Rent</option>
                            </select>
                            @error('car_type')<div class="alert alert-danger">{{ $message }}</div>@enderror
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
