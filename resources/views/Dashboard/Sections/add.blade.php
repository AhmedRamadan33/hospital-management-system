<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">add section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('section.store') }}" method="post" autocomplete="off"  >
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">Name <span class="tx-danger">*</span></label>
                    <input type="text" name="name" class="form-control" >
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">description <span class="tx-danger">*</span></label>
                    <textarea class="form-control" name="description"  cols="30" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
