@extends('Dashboard.layouts.master')
{{-- @section('css')

@endsection --}}
@section('title')
    Patient Info
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Patient Name : <span class="text-success tx-20 mb-0">
                        {{ $patient->name }}</span></h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
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
                                            <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                    data-toggle="tab"> Patient Info </a></li>
                                            <li class="nav-item"><a href="#tab2" class="nav-link"
                                                    data-toggle="tab">Invoices</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab3" class="nav-link"
                                                    data-toggle="tab">Receipt</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">
                                                    Accounts</a></li>
                                            <li class="nav-item"><a href="#tab5" class="nav-link"
                                                    data-toggle="tab">Rays</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab6" class="nav-link"
                                                    data-toggle="tab">Laboratory</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">

                                        {{-- Strat Show Information Patient --}}
                                        <div class="tab-pane active" id="tab1">
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email </th>
                                                            <th>Phone</th>
                                                            <th>Age</th>
                                                            <th>Gender</th>
                                                            <th>Blood Group</th>
                                                            <th>Address</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{ $patient->name }}</td>
                                                            <td>{{ $patient->email }}</td>
                                                            <td>{{ $patient->phone }}</td>
                                                            <td>{{ $patient->age }}</td>
                                                            <td>{{ $patient->gender == 1 ? 'Male' : 'Female' }}</td>
                                                            <td>{{ $patient->blood_group }}</td>
                                                            <td>{{ $patient->address }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Show Information Patient --}}


                                        {{-- Start Invices Patient --}}
                                        <div class="tab-pane" id="tab2">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Doctor Name</th>
                                                            <th>Section</th>
                                                            <th>Service Name</th>
                                                            <th> Date</th>
                                                            <th>Price </th>
                                                            <th>Type </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoices as $invoice)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $invoice->doctor->name }} </td>
                                                                <td>{{ $invoice->section->name }} </td>
                                                                <td>{{ $invoice->service->name ?? $invoice->group->name }}
                                                                </td>
                                                                <td>{{ $invoice->date }}</td>
                                                                <td>{{ $invoice->price }}</td>
                                                                <td>{{ $invoice->type == 1 ? 'Cash' : 'Payment' }}</td>
                                                            </tr>
                                                            <br>
                                                        @endforeach
                                                        <tr>
                                                            <th colspan="4" scope="row" class="alert alert-success">
                                                                Total
                                                            </th>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($invoices->sum('price'), 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Invices Patient --}}


                                        {{-- Start Receipt Patient  --}}
                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>description</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($receiptAccounts as $receiptAccount)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $receiptAccount->date }}</td>
                                                                <td>{{ $receiptAccount->amount }}</td>
                                                                <td>{{ $receiptAccount->description }}</td>
                                                            </tr>
                                                            <br>
                                                        @endforeach
                                                        <tr>
                                                            <th scope="row" class="alert alert-success">Total
                                                            </th>
                                                            <td colspan="4" class="alert alert-primary">
                                                                {{ number_format($receiptAccounts->sum('amount'), 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Receipt Patient  --}}

                                        {{-- Start payment accounts Patient --}}
                                        <div class="tab-pane" id="tab4">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center" id="example1">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Description</th>
                                                            <th>Debit</th>
                                                            <th>Credit</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($patientAccounts as $patientAccount)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $patientAccount->date }}</td>
                                                                <td>
                                                                    @if ($patientAccount->invoice_id == true)
                                                                        {{ $patientAccount->invoice->service->name ?? $patientAccount->invoice->group->name }}
                                                                    @elseif($patientAccount->receipt_id == true)
                                                                        {{ $patientAccount->receiptAccount->description }}
                                                                    @elseif($patientAccount->payment_id == true)
                                                                        {{ $patientAccount->paymentAccount->description }}
                                                                    @endif

                                                                </td>
                                                                <td>{{ $patientAccount->debit }}</td>
                                                                <td>{{ $patientAccount->credit }}</td>
                                                                <td></td>
                                                            </tr>
                                                            <br>
                                                        @endforeach
                                                        <tr>
                                                            <th colspan="3" scope="row" class="alert alert-success">
                                                                Total
                                                            </th>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($debit = $patientAccounts->sum('debit'), 2) }}
                                                            </td>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($credit = $patientAccounts->sum('credit'), 2) }}
                                                            </td>
                                                            <td class="alert alert-danger">
                                                                <span
                                                                    class="text-{{ $debit - $credit > 0 ? 'success' : 'danger' }}">
                                                                    {{ $debit - $credit }}
                                                                    {{ $debit - $credit > 0 ? 'debit' : 'credit' }}</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                        </div>
                                        {{-- End payment accounts Patient --}}

                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center" id="example1">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Description</th>
                                                            <th>doctor</th>
                                                            <th>show</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rays as $ray)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $ray->created_at }}</td>
                                                                <td>{{ $ray->description }}</td>
                                                                <td>{{ $ray->doctor->name }}</td>
                                                                <td>
                                                                    @if ($ray->employee_id !== null)
                                                                        <a class="btn btn-primary btn-sm"
                                                                            href="{{ route('patientRays.view_ray', $ray->id) }}" role="button">Show
                                                                            Ray</a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center" id="example1">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Description</th>
                                                            <th>Doctor</th>
                                                            <th>show</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($labs as $lab)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $lab->created_at }}</td>
                                                                <td>{{ $lab->description }}</td>
                                                                <td>{{ $lab->doctor->name }}</td>
                                                                <td>
                                                                    @if ($lab->employee_id !== null)
                                                                        <a class="btn btn-primary btn-sm"
                                                                            href="{{ route('patientLab.view_lab', $lab->id) }}" role="button">Show
                                                                            Lab</a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                        </div>
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
@endsection
