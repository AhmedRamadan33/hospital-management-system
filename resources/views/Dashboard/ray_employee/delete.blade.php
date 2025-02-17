<!-- Modal -->
<div class="modal fade" id="delete{{ $ray_employee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class=" text-warning">warning</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ray_employee.destroy', $ray_employee->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Employee Name : <span
                            class=" text-success">{{ $ray_employee->name }}</span></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
