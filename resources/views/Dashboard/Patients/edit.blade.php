@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
Edit Patient
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Edit Patient : <span class="text-success tx-20 mb-0">{{$patient->name}}</span></h4>
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
                    <form action="{{route('patient.update', $patient->id)}}" method="post" autocomplete="off">
                        @csrf
                    <div class="row mb-3">
                        <div class="col-3">
                            <label> Name</label>
                            <input type="text" name="name" value="{{$patient->name}}" class="form-control @error('name') is-invalid @enderror " >
                            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col">
                            <label> Email</label>
                            <input type="email" name="email" value="{{$patient->email}}" class="form-control @error('email') is-invalid @enderror" >
                            @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col">
                            <label> Age</label>
                            <input name="age" type="number" value="{{$patient->age}}" class="form-control @error('age') is-invalid @enderror" >
                            @error('age')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label> Phone</label>
                            <input type="number" name="phone" value="{{$patient->phone}}" class="form-control @error('phone') is-invalid @enderror" >
                            @error('phone')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col">
                            <label>Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option disabled selected>-- Choose  --</option>
                                <option value="male" {{$patient->gender == 'male' ? 'selected' : ''}}>Male</option>
                                <option value="female" {{$patient->gender == 'female' ? 'selected' : ''}}>Female</option>
                            </select>
                            @error('gender')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col">
                            <label>Blood Group</label>
                            <select name="blood_group" class="form-control @error('blood_group') is-invalid @enderror" >
                                <option disabled selected>-- Choose  --</option>
                                <option value="O-" {{$patient->blood_group == 'O-' ? 'selected' : ''}}>O-</option>
                                <option value="O+" {{$patient->blood_group == 'O+' ? 'selected' : ''}}>O+</option>
                                <option value="A+" {{$patient->blood_group == 'A+' ? 'selected' : ''}}>A+</option>
                                <option value="A-" {{$patient->blood_group == 'A-' ? 'selected' : ''}}>A-</option>
                                <option value="B+" {{$patient->blood_group == 'B+' ? 'selected' : ''}}>B+</option>
                                <option value="B-" {{$patient->blood_group == 'B-' ? 'selected' : ''}}>B-</option>
                                <option value="AB+" {{$patient->blood_group == 'AB+' ? 'selected' : ''}}>AB+</option>
                                <option value="AB-" {{$patient->blood_group == 'AB-' ? 'selected' : ''}}>AB-</option>
                            </select>
                            @error('blood_group')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>Address</label>
                            <textarea rows="3" cols="10" name="address" class="form-control @error('address') is-invalid @enderror" >{{$patient->address}}</textarea>
                            @error('address')<div class="alert alert-danger">{{ $message }}</div>@enderror

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

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
