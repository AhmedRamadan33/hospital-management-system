@extends('Dashboard.layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('title')
Add A New Receipt
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Accounts</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ Add A New Receipt</span>
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
                    <form action="{{ route('receiptAccount.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="pd-30 pd-sm-40 bg-gray-200">

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-2">
                                    <label> Patient Name</label>
                                </div>
                                <div class="col-md-10 mg-t-5 mg-md-t-0">
                                   <select name="patient_id" class="form-control select2 @error('patient_id') is-invalid @enderror" >
                                    <option selected disabled>-- Choose --</option>
                                      @foreach($patients as $patient)
                                           <option value="{{$patient->id}}">{{$patient->name}}</option>
                                      @endforeach
                                    </select>
                                    @error('patient_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-2">
                                    <label>Amount</label>
                                </div>
                                <div class="col-md-10 mg-t-5 mg-md-t-0">
                                    <input class="form-control @error('amount') is-invalid @enderror" name="amount" type="number">
                                    @error('amount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-2">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-10 mg-t-5 mg-md-t-0">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3"></textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">Submit</button>
                        </div>
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

    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('Dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('Dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('Dashboard/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('Dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('Dashboard/js/form-elements.js')}}"></script>
@endsection
