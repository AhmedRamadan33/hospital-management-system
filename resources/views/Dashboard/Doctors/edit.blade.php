@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

@section('title')
    Edit Doctor
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> Doctors</h4><span class="text-muted mt-1 tx-18 ml-1 mb-0">/
                Edit Doctor : <span class="text text-success">{{ $doctor->name }}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@include('Dashboard.layouts.messages_notif')

<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('doctor.update', $doctor->id) }}" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="pd-30 pd-sm-40 bg-gray-200">
                        <div>
                            @if ($doctor->image->fileName == 'user.jpg')
                                <img style="border-radius:50%" src="{{ Url::asset('Dashboard/img/user.jpg') }}"
                                    height="50px" width="50px" alt="">
                            @else
                                <img style="border-radius:20%"
                                    src="{{ Url::asset('Dashboard/img/doctors/' . $doctor->image->fileName) }}"
                                    height="150px" width="150px" alt="">
                            @endif
                        </div>
                        <br><br>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">
                                    Name</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $doctor->name }}" type="text">
                                @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror

                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">
                                    Email </label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input class="form-control @error('email') is-invalid @enderror" value="{{ $doctor->email }}" name="email" type="email">
                                @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror

                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">
                                    Phone</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input class="form-control @error('phone') is-invalid @enderror" value="{{ $doctor->phone }}" name="phone" type="tel">
                                @error('phone')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="status">Status</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" >
                                    <option value="1" {{ $doctor->status == 1 ? 'selected' : '' }}>Enabled
                                    </option>
                                    <option value="0" {{ $doctor->status == 0 ? 'selected' : '' }}>Disabled
                                    </option>
                                </select>
                                @error('status')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">
                                    Section</label>
                            </div>

                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <select name="sectionId" class="form-control SlectBox @error('sectionId') is-invalid @enderror">
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"
                                            {{ $section->id == $doctor->sectionId ? 'selected' : '' }}>
                                            {{ $section->name }}</option>
                                    @endforeach
                                </select>
                                @error('sectionId')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class=" row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">
                                    Appointments</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <select multiple="multiple" class="testselect2 @error('appointments') is-invalid @enderror" name="appointments[]">
                                    @foreach ($appointments as $appointment)
                                        @php $check = []; @endphp
                                        @foreach ($doctor->doctorAppointments as  $appointmentDoc)
                                            @php $check [] = $appointmentDoc->id  @endphp
                                        @endforeach
                                        <option value="{{ $appointment->id }}"
                                            {{ in_array($appointment->id, $check) ? 'selected' : '' }}>
                                            {{ $appointment->name }}</option>
                                    @endforeach
                                </select>
                                @error('appointments')<div class="alert alert-danger">{{ $message }}</div>@enderror

                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">Photo</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input class="@error('photo') is-invalid @enderror" type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                @error('photo')<div class="alert alert-danger">{{ $message }}</div>@enderror

                                <img style="border-radius:50%" width="150px" height="150px" id="output" />
                            </div>
                        </div>


                        <button type="submit" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>

<!--Internal  Form-elements js-->
<script src="{{ URL::asset('Dashboard/js/select2.js') }}"></script>
<script src="{{ URL::asset('Dashboard/js/advanced-form-elements.js') }}"></script>

<!--Internal Sumoselect js-->
<script src="{{ URL::asset('Dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>


<!--Internal  Datepicker js -->
<script src="{{ URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal Select2.min js -->
<script src="{{ URL::asset('dashboard/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{ URL::asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ URL::asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<!--Internal  pickerjs js -->
<script src="{{ URL::asset('dashboard/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('dashboard/js/form-elements.js') }}"></script>


@endsection
