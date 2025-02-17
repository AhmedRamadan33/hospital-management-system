@extends('Dashboard.layouts.master')
@section('css')
<!--Internal   Notify -->
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    Insurance
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> Dashboard</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ Insurance</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@include('Dashboard.layouts.messages_notif')

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <a href="{{route('insurance.create')}}" class="btn btn-primary">Add Insurance</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table text-md-nowrap" id="example2">
                            <thead>
                            <tr >
                                <th>#</th>
                                <th >Company code</th>
                                <th >Company Name</th>
                                <th >Patient Bearing Percentage %</th>
                                <th >Company Bearing Percentage %</th>
                                <th >Status</th>
                                <th >Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($insurances as $insurance)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$insurance->insurance_code}}</td>
                                    <td>{{$insurance->name}}</td>
                                    <td>{{$insurance->discount_percentage}}%</td>
                                    <td>{{$insurance->company_rate}}%</td>
                                    <td class="text text-{{ $insurance->status == 1 ? 'success' : 'danger' }} ">{{ $insurance->status == 1 ? ' Enabled' : ' Disabled' }}</td>
                                    <td>
                                        <a href="{{route('insurance.edit',$insurance->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted{{$insurance->id}}"><i class="fas fa-trash"></i>
                                        </button>

                                    </td>
                                 @include('Dashboard.insurances.delete')
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
