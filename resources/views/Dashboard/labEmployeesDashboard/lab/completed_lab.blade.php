@extends('Dashboard.layouts.master')
@section('title')
Completed lab
@stop
@section('css')


    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Labs</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ Completed lab</span>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>created_at</th>
                                <th>patient name</th>
                                <th>doctor name</th>
                                <th>description</th>
                                <th> status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($labs as $lab)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $lab->created_at }}</td>
                                    <td><a href="{{route('labEmp.show',$lab->id)}}">{{ $lab->patient->name }}</a></td>
                                    <td>{{ $lab->doctor->name }}</td>
                                    <td>{{ $lab->description }}</td>
                                    <td><span class="badge badge-success">Completed</span></td>
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

