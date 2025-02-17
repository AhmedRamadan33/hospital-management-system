<div>

    @if ($show_table)
        @include('livewire.groupInvoices.table')
    @else
        <form wire:submit.prevent="store" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col">
                    <label> Patient Name</label>
                    <select wire:model="patient_id" class="form-control @error('patient_id') is-invalid @enderror"
                        required>
                        <option {{ $updateMode == true ? 'disabled' : '' }}>-- Choose --</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label> Doctor Name</label>
                    <select wire:model="doctor_id" wire:change="get_section"
                        class="form-control @error('doctor_id') is-invalid @enderror" id="exampleFormControlSelect1"
                        required>
                        <option {{ $updateMode == true ? 'disabled' : '' }}>-- Choose --</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col">
                    <label>Section</label>
                    <input wire:model="section_id" type="text"
                        class="form-control @error('section_id') is-invalid @enderror" readonly>
                    @error('section_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label> Type </label>
                    <select wire:model="type" class="form-control @error('type') is-invalid @enderror"
                        {{ $updateMode == true ? 'disabled' : '' }}>
                        <option>-- Choose --</option>
                        <option value="1">Cash</option>
                        <option value="2">Payment</option>
                    </select>
                    @error('type')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div><br>

            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0"></h4>
                            </div>
                        </div>
                        <div class="row row-sm px-3 pb-5">

                            <div class="col-6">
                                <label> Service Name </label>
                                <select wire:model="service_id"
                                    class="form-control @error('service_id') is-invalid @enderror"
                                    wire:change="get_price" id="exampleFormControlSelect1">
                                    <option {{ $updateMode == true ? 'disabled' : '' }}>-- Choose --</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label> Service Price </label>
                                <input wire:model="price" type="text"
                                    class="form-control @error('price') is-invalid @enderror" readonly>
                                @error('price')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>
            <input class="btn btn-outline-success" type="submit" value=" Submit">
        </form>

    @endif


</div>
