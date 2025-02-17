@extends('Dashboard.layouts.master')
@section('title')
    Dashboard/offered services
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto mr-1">Services</h4><span class="text-muted mt-1 tx-15 mr-2 mb-0"> / offered services</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.layouts.messages_alert')
<!-- row -->
                    <!-- row opened -->
                    <div class="row row-sm">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">

                                </div>
                                <div class="card-body">
                                    <livewire:services-offered/>

                            </div><!-- bd -->
                        </div>
                        <!--/div-->

                    <!-- /row -->
				</div>

				</div>
				<!-- row closed -->

			<!-- Container closed -->

		<!-- main-content closed -->
@endsection
@section('js')


    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
