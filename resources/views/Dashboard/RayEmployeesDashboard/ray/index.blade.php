@extends('Dashboard.layouts.master')
@section('title')
    Rays
@stop
@section('css')


    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Rays</h4><span class="text-muted mt-1 tx-15 ml-1 mb-0">/ List</span>
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
                                    <th>description</th>
                                    <th> doctor name</th>
                                    <th>Patient name</th>
                                    <th>created at</th>

                                    <th> status</th>
                                    <th>processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rays as $ray)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ray->description }}</td>
                                        <td>{{ $ray->doctor->name }}</td>
                                        <td>{{ $ray->patient->name }}</td>
                                        <td>{{ $ray->created_at }}</td>

                                        <td>
                                        @if ($ray->status == 0)
                                            <span class="badge badge-danger">Not Completed</span>
                                        @else
                                            <span class="badge badge-success">Completed</span>
                                        @endif
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">Processes<i
                                                        class="fas fa-caret-down mr-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <a class="dropdown-item"
                                                        href="{{ route('rayEmp.edit', $ray->id) }}"><i
                                                            class="text-primary fa fa-stethoscope"></i>&nbsp;&nbsp;Add the ray result
                                                         </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7"> <h2 class=" text-center text-warning mt-3" > You Have No Data Yet. </h2></td>
                                    </tr>
                                @endforelse
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
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>

@endsection
