@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ drivers</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.layouts.messages_notif')
				<!-- row opened -->
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
                                    <a href="{{route('driver.create')}}" class="btn btn-primary"> Add a new driver </a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th>#</th>
												<th > Name</th>
                                                <th > License Type</th>
                                                <th > License Number</th>
                                                <th > Phone</th>
                                                <th > Status</th>
                                                <th>Processes</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($drivers as $driver)
											<tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$driver->name}}</td>
                                                <td>{{$driver->license_type}}</td>
                                                <td>{{$driver->license_number}}</td>
                                                <td>{{$driver->phone}}</td>
                                                <td class="text text-{{ $driver->status == 1 ? 'success' : 'danger' }} ">{{ $driver->status == 1 ? ' Enabled' : ' Disabled' }}</td>

                                                <td>
                                                    <a href="{{route('driver.edit',$driver->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted{{$driver->id}}"><i class="fas fa-trash"></i></button>
                                                </td>
											</tr>
                                            @include('Dashboard.drivers.delete')
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
