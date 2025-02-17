<!-- Modal -->
<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit section : <span class="text text-success">{{$section->name}}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('section.update', $section->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="name" value="{{ $section->name }}" class="form-control">
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">description</label>
                    <textarea class="form-control" name="description"  cols="30" rows="3">{{ $section->description }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
