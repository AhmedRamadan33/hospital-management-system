
<button class="btn btn-primary pull-right" wire:click="show_form_add" type="button"> Add A New Offer Services Group </button><br><br>
<div class="table-responsive">
        <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Before Discount</th>
                <th>discount_value</th>
                <th>After Discount</th>
                <th>taxes</th>
                <th>Total</th>
                <th>Notes</th>
                <th>Processes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->before_discount }}</td>
                    <td>{{ $group->discount_value }}</td>
                    <td>{{ $group->after_discount }}</td>
                    <td>{{ $group->taxes }}</td>
                    <td>{{ number_format($group->total, 2) }}</td>
                    <td>{{ $group->notes }}</td>
                    <td>
                        <button wire:click="edit({{ $group->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteGroup{{$group->id}}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
              @include('livewire.ServicesOffered.delete')
            @endforeach
    </table>

</div>



