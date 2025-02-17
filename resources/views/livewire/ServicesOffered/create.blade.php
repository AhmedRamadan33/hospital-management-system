<div>

    @if ($show_table)
        @include('livewire.ServicesOffered.index')
    @else
        <form wire:submit.prevent="store" autocomplete="off">
            @csrf
            <div class="form-group">
                <label>Group Name</label>
                <input wire:model="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label>notes</label>
                <textarea wire:model="notes" name="notes" class="form-control @error('notes') is-invalid @enderror" rows="5"></textarea>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <div class="col-md-12">
                        <button class="btn btn-outline-primary" wire:click.prevent="addService"> Add Service
                        </button>
                        @error('GroupsItems')<span class="error text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th> Service Name </th>
                                    <th width="200">Processes</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($GroupsItems as $index => $groupItem)
                                    <tr>
                                        <td>
                                            <select {{$groupItem['is_saved'] == true ? 'disabled' : ''}}
                                                class="form-control{{ $errors->has('GroupsItems.' . $index) ? ' is-invalid' : '' }}"
                                                wire:model="GroupsItems.{{ $index }}.service_id">

                                                <option>-- choose product --</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">
                                                        {{ $service->name }}
                                                        ({{ number_format($service->price, 2) }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('GroupsItems.*.service_id')<span class="error text-danger">{{ $message }}</span>@enderror
                                            @if ($errors->has('GroupsItems.' . $index))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('GroupsItems.' . $index) }}
                                                </em>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($groupItem['service_id'])
                                                @if ($groupItem['is_saved'] == false)
                                                    <button class="btn btn-sm btn-success mr-1"
                                                        wire:click.prevent="saveService({{ $index }})">
                                                        save
                                                    </button>
                                                @endif

                                                <button class="btn btn-sm btn-danger"
                                                    wire:click.prevent="removeService({{ $index }})">Delete
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="col-lg-4 ml-auto text-right">
                        <table class="table pull-right">
                            <tr>
                                <td style="color: #37374e">Subtotal</td>
                                <td>{{ number_format($subtotal, 2) }}</td>
                            </tr>

                            <tr>
                                <td style="color: #37374e"> Discount Value </td>
                                <td width="125">
                                    <input type="number" name="discount_value" class="form-control w-75 d-inline @error('discount_value') is-invalid @enderror"
                                        min="0" wire:model="discount_value">
                                        @error('discount_value')<span class="error text-danger">{{ $message }}</span>@enderror
                                </td>
                            </tr>

                            <tr>
                                <td style="color: #37374e">Tax Rate</td>
                                <td>
                                    <input type="number" name="taxes" class="form-control w-75 d-inline @error('taxes') is-invalid @enderror"
                                        min="0" max="100" wire:model="taxes"> %
                                        @error('taxes')<span class="error text-danger">{{ $message }}</span>@enderror
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #37374e"> Total </td>
                                <td>{{ number_format($total, 2) }}</td>
                            </tr>
                        </table>
                    </div>
                    <br />
                    <div>
                        <input class="btn btn-outline-success" type="submit" value="submit">
                    </div>
                </div>
            </div>

        </form>
    @endif


</div>
