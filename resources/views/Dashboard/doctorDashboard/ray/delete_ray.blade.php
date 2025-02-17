<!-- Deleted insurance -->
<div class="modal fade" id="delete_ray{{$ray->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Delete Ray</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ray.destroy', $ray->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <p class="h5 text-danger"> Are you sure about deleting? </p>
                            <input type="text" class="form-control" readonly value="{{ $ray->description }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">close</button>
                        <button class="btn btn-warning"> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
