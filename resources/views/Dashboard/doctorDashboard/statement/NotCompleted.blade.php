@extends('Dashboard.layouts.master')
@section('title')
Statement
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

    <link href="{{URL::asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Statement</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ Not Completed</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.layouts.messages_notif')
				<!-- row -->
                    <!-- row opened -->
                    <div class="row row-sm">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-md-nowrap" id="example1">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> date</th>
                                                <th> service</th>
                                                <th> patient</th>
                                                <th>price</th>
                                                <th> status</th>
                                                <th>processes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($invoices as $invoice)
                                               <tr>
                                                   <td>{{ $loop->iteration}}</td>
                                                   <td>{{ $invoice->date }}</td>
                                                   <td>{{ $invoice->service->name ?? $invoice->group->name }}</td>
                                                   <td><a href="{{route('diagnostics.patient_Info',$invoice->patient_id)}}">{{ $invoice->patient->name }}</a></td>
                                                   <td>{{ number_format($invoice->price, 2) }}</td>
                                                   <td>
                                                    @if($invoice->status == 1)
                                                    <span class="badge badge-success">Completed</span>
                                                     @else
                                                     <span class="badge badge-danger">Under process</span>
                                                     @endif
                                                   </td>

                                                   <td>
                                                    <div class="dropdown-toggle">
                                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">Processes<i class="fas fa-caret-down mr-1"></i></button>
                                                        <div class="dropdown-menu ">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_diagnosis{{$invoice->id}}"><i class="text-primary fa fa-stethoscope"></i>&nbsp;&nbsp; add diagnosis </a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ray_conversion{{$invoice->id}}"><i class="text-primary fas fa-x-ray"></i>&nbsp;&nbsp; convert to rays </a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#lab_conversion{{$invoice->id}}"><i class="text-warning fas fa-syringe"></i>&nbsp;&nbsp; convert to lab </a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit{{$invoice->id}}"><i class="text-danger  ti-trash"></i>&nbsp;&nbsp; Edit Status</a>

                                                        </div>
                                                    </div>
                                                   </td>
                                               </tr>

                                               @include('Dashboard.doctorDashboard.diagnose.add')
                                               @include('Dashboard.doctorDashboard.statement.edit_status')
                                               @include('Dashboard.doctorDashboard.ray.ray_conversion')
                                               @include('Dashboard.doctorDashboard.lab.lab_conversion')

                                           @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->

                    <!-- /row -->
				</div>
				<!-- row closed -->

			<!-- Container closed -->

		<!-- main-content closed -->
@endsection
@section('js')



    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('dashboard/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('dashboard/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('dashboard/js/form-elements.js')}}"></script>


    <script>
        $('#review_date').datetimepicker({

        })
    </script>

@endsection
