@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
patient info
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Dashboard</h4><span
                    class="text-muted mt-1 tx-15 ml-1 mb-0">/ patient info</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.layouts.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Patient record</a></li>
                                            <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Ray</a></li>
                                            <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">Lap</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">


                                        {{-- Strat Show Information Patient --}}

                                        <div class="tab-pane active" id="tab1">
                                            <br>
                                            <div class="vtimeline">
                                                @foreach($patient_records as $patient_record)
                                                    <div class="timeline-wrapper {{ $loop->iteration % 2 == 0 ? 'timeline-inverted' : '' }} timeline-wrapper-primary">
                                                        <div class="timeline-badge"><i class="las la-check-circle"></i></div>
                                                        <div class="timeline-panel">
                                                            <div class="timeline-heading">
                                                                <h3 class="timeline-title">{{$patient_record->name}}</h3>
                                                            </div>
                                                            <div class="timeline-body">
                                                                <h6>{{$patient_record->medicine}}</h6>
                                                            </div>
                                                            <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                                <i class="fas fa-user-md"></i>&nbsp;
                                                                <span>{{$patient_record->doctor->name}}</span>
                                                            </div>
                                                            <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                                <i class="fe fe-calendar text-muted small"></i>&nbsp;
                                                                <span class="mr-auto">Date :<span class="mr-1"></span>{{$patient_record->date }}</span>                                                            </div>
                                                            <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                                <i class="fe fe-calendar text-muted small"></i>&nbsp;
                                                                <span class="mr-auto">Review Date :<span class="mr-1"></span>{{$patient_record->review_date ?? 'nothing'  }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- End Show Information Patient --}}



                                        <div class="tab-pane" id="tab2">

                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Description</th>
                                                        <th>Doctor Name</th>
                                                        <th>Ray Employee Name</th>
                                                        <th>Status</th>
                                                        <th>Processes</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($rays as $ray)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$ray->description}}</td>
                                                            <td>{{$ray->doctor->name}}</td>
                                                            <td>{{$ray->employee->name ?? 'None'}}</td>

                                                            @if($ray->status == 0)
                                                                <td class="text-danger">Not Completed</td>
                                                            @else
                                                                <td class="text-success"> Completed</td>
                                                            @endif

                                                                @if($ray->status == 0)
                                                                <td>
                                                                    <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"  data-toggle="modal" href="#edit_ray_conversion{{$ray->id}}"><i class="fas fa-edit"></i></a>
                                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete_ray{{$ray->id}}"><i class="las la-trash"></i></a>
                                                                </td>

                                                                @else
                                                                    <td><a target="_blank" class="modal-effect btn btn-sm btn-warning"  href="{{route('ray.show',$ray->id)}}"><i class="fas fa-binoculars"></i></a></td>
                                                                @endif
                                                        </tr>
                                                        @include('Dashboard.doctorDashboard.ray.edit_ray_conversion')
                                                        @include('Dashboard.doctorDashboard.ray.delete_ray')
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> description</th>
                                                        <th>doctor name</th>
                                                        <th>employee name</th>
                                                        <th>status</th>
                                                        <th>processes</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($labs as $lab)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$lab->description}}</td>
                                                            <td>{{$lab->doctor->name}}</td>
                                                            <td>{{$lab->employee->name ?? 'nothing'}}</td>
                                                            @if($lab->status == 0)
                                                                <td class="text-danger">Not Completed</td>
                                                            @else
                                                                <td class="text-success"> Completed</td>
                                                            @endif


                                                                @if($lab->status == 0)
                                                                    <td>
                                                                        <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"  data-toggle="modal" href="#edit_lab_conversion{{$lab->id}}"><i class="fas fa-edit"></i></a>
                                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$lab->id}}"><i class="las la-trash"></i></a>
                                                                    </td>
                                                                @else
                                                                    <td>
                                                                        <a target="_blank" class="modal-effect btn btn-sm btn-warning"  href="{{route('lab.show',$lab->id)}}"><i class="fas fa-binoculars"></i></a>
                                                                    </td>

                                                                @endif

                                                        </tr>
                                                        @include('Dashboard.doctorDashboard.lab.edit_lab_conversion')
                                                        @include('Dashboard.doctorDashboard.lab.delete_lab')
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Receipt Patient  --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Prism Precode -->
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
@endsection
@section('js')
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
