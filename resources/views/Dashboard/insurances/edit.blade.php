@extends('Dashboard.layouts.master')
@section('css')

    <!--Internal   Notify -->
    <link href="{{ URL::asset('Admin/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>
@endsection
@section('title')
    Edit Insurance
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> Edit Insurance : <span class="text-success tx-20 ml-1"> {{$insurances->name}}</span> </h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('insurance.update', $insurances->id)}}" method="post">
                        @csrf
                        <div class="row mb-4">

                            <div class="col-md-6">
                                <label>Company Ccode</label>
                                <input type="text" name="insurance_code" value="{{$insurances->insurance_code}}"
                                       class="form-control @error('insurance_code') is-invalid @enderror">
                                @error('insurance_code') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$insurances->name}}"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')<div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col">
                                <label>Patient Bearing Percentage %</label>
                                <input type="number" min="0" name="discount_percentage" value="{{$insurances->discount_percentage}}"
                                       class="form-control @error ('discount_percentage') is-invalid @enderror">
                                @error('discount_percentage') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="col">
                                <label>Company Bearing Percentage %</label>
                                <input type="number" min="0" name="company_rate"
                                    value="{{$insurances->company_rate}}"  class="form-control @error ('company_rate') is-invalid @enderror">
                                @error('company_rate')<div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <label> Status</label>
                                <input name="status"{{$insurances->status == 1 ? 'checked' : ''}} value="{{$insurances->status}}" type="checkbox" class="form-check-input ml-1" id="exampleCheck1">
                                @error('status')<div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">Save</button>
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
    <!--Internal  Notify js -->
    <script src="{{URL::asset('Admin/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('Admin/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
