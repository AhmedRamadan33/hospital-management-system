@extends('Dashboard.layouts.master')
@section('title')
Profile
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Profile
@stop
<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.layouts.messages_notif')

<!-- row -->
<div class="card-body">
    <section style="background-color: #eee;">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ URL::asset('Dashboard/img/user.jpg') }}" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 style="font-family: Cairo" class="my-3">{{ Auth::user()->name}}</h5>
                        <p class="text-muted mb-1">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('profile.update', Auth::user()->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Current Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="password" class="form-control" name="currentPassword">
                                        @error('currentPassword')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">New Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="password" class="form-control" name="newPassword">
                                        @error('newPassword')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <p class="mb-0">Confirm Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="password" class="form-control" id="password" name="confirmPassword">
                                        @error('confirmPassword')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </p><br><br>
                                    <input type="checkbox" class="form-check-input ml-1" onclick="myFunction()"
                                        id="exampleCheck1">
                                    <label class="form-check-label ml-4" for="exampleCheck1">display password</label>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success">Submit </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection
