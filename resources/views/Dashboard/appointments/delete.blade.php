<!-- Deleted insurance -->
<div class="modal fade" id="Refusal{{$appointment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure you want to delete it ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('appointment.destroy',$appointment->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <p class="h5 text-muted"> Patient Name : <span class=" text-secondary">{{$appointment->name}}</span></p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
