<!-- Modal -->
<div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Service : <span
                        class="text text-success">{{ $service->name }}</span> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('service.update', $service->id) }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">
                                Name</label>
                        </div>
                        <div class="col-md-10 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="name" value="{{ $service->name }}" type="text">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">
                                price</label>
                        </div>
                        <div class="col-md-10 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="price" value="{{ $service->price }}" type="text">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">
                                Section</label>
                        </div>
                        <div class="col-md-10 mg-t-5 mg-md-t-0">
                            <select class="form-control" name="sectionId" id="sectionId">
                                @foreach ($sections as $section)
                                    <option {{$section->id == $service->section->id ? 'selected' : ''}} value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">
                                Status</label>
                        </div>
                        <div class="col-md-10 mg-t-5 mg-md-t-0">
                            <select class="form-control" id="status" name="status" required>
                                <option {{ $service->status == 1 ? 'selected' : '' }} value="1">Enabled</option>
                                <option {{ $service->status == 0 ? 'selected' : '' }} value="0">Disabled</option>
                            </select>
                        </div>
                    </div>

                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">
                                Description</label>
                        </div>
                        <div class="col-md-10 mg-t-5 mg-md-t-0">
                            <textarea class="form-control" name="description" id="description" rows="5">{{ $service->description }}</textarea>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
