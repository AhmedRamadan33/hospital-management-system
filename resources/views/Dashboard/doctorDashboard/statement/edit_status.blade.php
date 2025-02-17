<!-- Modal -->
<div class="modal fade" id="edit{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">status update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('status.update',$invoice->id)}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option {{$invoice->status == 0 ? 'selected' : ''}} value="0">Not Completed</option>
                        <option {{$invoice->status == 1 ? 'selected' : ''}} value="1">Completed</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
