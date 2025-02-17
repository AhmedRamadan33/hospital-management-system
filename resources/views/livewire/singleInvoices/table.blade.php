<button class="btn btn-primary pull-right" wire:click="show_form" type="button"> Add A New Invoice </button><br><br>
<div class="table-responsive">
    <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th> Patient Name</th>
                <th>Service Name</th>
                <th> Date</th>
                <th> Doctor Name</th>
                <th>Section</th>
                <th>Price </th>
                <th>Type </th>
                <th>Processes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $invoice->patient->name }}</td>
                    <td>{{ $invoice->service->name }}</td>
                    <td>{{ $invoice->date }}</td>
                    <td>{{ $invoice->doctor->name }}</td>
                    <td>{{ $invoice->section->name }}</td>
                    <td>{{ number_format($invoice->price, 2) }}</td>
                    <td>{{ $invoice->type == 1 ? 'Cash' : 'Payment' }}</td>
                    <td>
                        <button wire:click="edit({{ $invoice->id }})" class="btn btn-primary btn-sm"><i
                                class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete_invoice{{$invoice->id}}"><i
                                class="fa fa-trash"></i></button>
                        <button wire:click="print({{ $invoice->id }})" class="btn btn-primary btn-sm"><i
                                class="fas fa-print"></i></button>
                    </td>
                </tr>
                @include('livewire.singleInvoices.delete')
            @endforeach
    </table>
</div>
