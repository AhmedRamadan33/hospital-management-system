@extends('Dashboard.layouts.master')
@section('title')
    Doctors
@stop
@section('css')
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Dashboard</h4>
                <span class="text-muted mt-1 tx-15 ml-1 mb-0">/
                    Doctors</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.layouts.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                    <a href="{{ route('doctor.create') }}" class="btn btn-primary" role="button" aria-pressed="true">Add
                        Doctor</a>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0">#</th>
                                    <th class="wd-5p border-bottom-0">Name</th>
                                    <th class="wd-5p border-bottom-0">Email</th>
                                    <th class="wd-5p border-bottom-0">Phone</th>
                                    <th class="wd-5p border-bottom-0">Section</th>
                                    <th class="wd-5p border-bottom-0">Appointments</th>
                                    <th class="wd-5p border-bottom-0">Photo</th>
                                    <th class="wd-5p border-bottom-0">Status</th>
                                    <th class="wd-10p border-bottom-0">Created_at</th>
                                    <th class="wd-10p border-bottom-0">Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->section->name }}</td>
                                        <td>
                                            @foreach ($doctor->doctorAppointments as $appointment)
                                            {{$appointment->name}} <span >&</span>

                                            @endforeach
                                        </td>

                                        <td>
                                            @if ($doctor->image->fileName == 'user.jpg')
                                                <img src="{{ Url::asset('Dashboard/img/user.jpg') }}" height="50px"
                                                    width="50px" alt="">
                                            @else
                                                <img src="{{ Url::asset('Dashboard/img/doctors/' . $doctor->image->fileName) }}"
                                                    height="50px" width="50px" alt="">
                                            @endif
                                        </td>
                                        <td class="text text-{{ $doctor->status == 1 ? 'success' : 'danger' }} ">

                                            {{ $doctor->status == 1 ? ' Enabled' : ' disabled' }}
                                        </td>
                                        <td>{{ $doctor->created_at->diffForHumans() }}</td>

                                        <td>

                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">Processes<i class="fas fa-caret-down mr-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <a class="dropdown-item"
                                                        href="{{ route('doctor.edit', $doctor->id) }}"><i
                                                            style="color: #0ba360"
                                                            class="text-success ti-user"></i>&nbsp;&nbsp; Edit</a>

                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_password{{ $doctor->id }}"><i
                                                            class="text-primary ti-key"></i>&nbsp;&nbsp;  Edit Password</a>

                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#delete{{ $doctor->id }}"><i
                                                            class="text-danger  ti-trash"></i>&nbsp;&nbsp;Delete </a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @include('Dashboard.Doctors.editPassword')
                                    @include('Dashboard.Doctors.delete')

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>






@endsection
