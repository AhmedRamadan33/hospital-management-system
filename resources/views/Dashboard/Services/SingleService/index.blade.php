@extends('Dashboard.layouts.master')
@section('title')
    Service
@stop
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Dashboard</h4><span
                    class="text-muted mt-1 tx-15 ml-1 mb-0">/ Service</span>
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
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            Add Service
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th> Price</th>
                                <th> Section</th>
                                <th> Status</th>
                                <th> Description</th>
                                <th>Created_at</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->price}}</td>
                                    <td>{{$service->section->name}}</td>

                                    <td class="text text-{{ $service->status == 1 ? 'success' : 'danger' }} ">

                                        {{ $service->status == 1 ? ' Enabled' : ' Disabled' }}
                                    </td>
                                    <td> {{ Str::limit($service->description, 50) }}</td>
                                    <td>{{ $service->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-toggle="modal" href="#edit{{$service->id}}"><i
                                                class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{$service->id}}"><i
                                                class="las la-trash"></i></a>
                                    </td>
                                </tr>

                                @include('Dashboard.Services.SingleService.edit')
                                @include('Dashboard.Services.SingleService.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    @include('Dashboard.Services.SingleService.add')
    <!-- /row -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
