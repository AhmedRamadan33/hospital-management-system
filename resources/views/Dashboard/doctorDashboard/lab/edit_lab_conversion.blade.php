<!-- Modal -->
<div class="modal fade" id="edit_lab_conversion{{$lab->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Lab convertion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('lab.update',$lab->id)}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">What is required?</label>
                    <textarea class="form-control" name="description" rows="6">{{$lab->description}}</textarea>
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
