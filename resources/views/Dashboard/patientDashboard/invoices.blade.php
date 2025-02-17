@extends('Dashboard.layouts.master')
@section('title')
    Invoices
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
							<h4 class="content-title mb-0 my-auto">Dashboard </h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ Invoices</span>
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
                                <div class="card-header pb-0">
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table style="text-align: center" class="table text-md-nowrap" id="example1">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> date</th>
                                                <th >doctor</th>
                                                <th>service</th>
                                                <th>section</th>
                                                <th >total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($invoices as $invoice)
                                               <tr>
                                                   <td>{{$loop->iteration}}</td>
                                                   <td>{{$invoice->date}}</td>
                                                   <td>{{$invoice->doctor->name}}</td>
                                                   <td>{{$invoice->service->name}}</td>
                                                   <td>{{$invoice->section->name}}</td>
                                                   <td>{{$invoice->price}}</td>
                                               </tr>

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

@endsection
