<!-- Modal -->
<div class="modal fade" id="add_diagnosis{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Diagnosis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('diagnostics.store')}}" method="POST">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="patient_id" value="{{$invoice->patient_id}}">
                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Diagnosis</label>
                    <textarea class="form-control" name="name" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">medicine</label>
                    <textarea class="form-control" name="medicine" rows="3"></textarea>
                </div>

                <div class="form-group" style="position:relative;">
                    <label> Review Date</label>
                    <input class="form-control fc-datepicker" id="review_date" name="review_date" type="text" >
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
