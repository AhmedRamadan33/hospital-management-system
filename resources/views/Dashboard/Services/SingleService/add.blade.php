<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Service </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('service.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1"> Name</label>
                        </div>
                        <div class="col-md-10 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="name" type="text">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1"> Price</label>
                        </div>
                        <div class="col-md-10 mg-t-5 mg-md-t-0">
                            <input type="number" name="price" id="price" class="form-control"><br>
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-2">
                            <label for="exampleInputEmail1"> Section</label>
                        </div>
                        <div class="col-md-10 mg-t-5 mg-md-t-0">
                            <select class="form-control" name="sectionId" id="sectionId">
                                <option selected disabled >-- choose --</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-2">
                            <label for="description">Description</label>
                        </div>
                        <div class="col-md-10 mg-t-5 mg-md-t-0">
                            <textarea class="form-control" name="description" id="description" rows="5"></textarea>
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
