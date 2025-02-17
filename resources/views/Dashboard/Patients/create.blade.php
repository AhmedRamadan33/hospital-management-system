@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Add A New Patient
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Patient</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ Add A New
                    Patient</span>
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
                    <form action="{{ route('patient.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-3">
                                <label> Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror ">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col">
                                <label> Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col">
                                <label> Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label> Phone</label>
                                <input type="number" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col">
                                <label> Age</label>
                                <input name="age" type="number"
                                    class="form-control @error('age') is-invalid @enderror">
                                @error('age')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col">
                                <label>Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option disabled selected>-- Choose --</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label>Blood Group</label>
                                <select name="blood_group" class="form-control @error('blood_group') is-invalid @enderror">
                                    <option disabled selected>-- Choose --</option>
                                    <option value="O-">O-</option>
                                    <option value="O+">O+</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                @error('blood_group')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col">
                                <label>Address</label>
                                <textarea rows="3" cols="10" name="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
