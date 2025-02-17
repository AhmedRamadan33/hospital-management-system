<!-- Modal -->
<div class="modal fade" id="delete{{ $receipt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Are You Sure you want to delete it ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('receiptAccount.destroy',$receipt->id) }}" method="post">
                @csrf
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">  Delete Receipt Patient : <span class=" text-success"> {{ $receipt->patient->name }}</span></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
