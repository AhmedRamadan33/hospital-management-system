<!-- Modal -->
<div class="modal fade" id="delete_invoice{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class=" text-warning">Warning</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>

               <div class="modal-body">
               <h5 class="modal-title" id="exampleModalLabel"> Delete Invoice Patient: <span class="text text-success">{{$invoice->patient->name}}</span></h5>

               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="button" wire:click="destroy({{ $invoice->id }})" class="btn btn-danger">Submit</button>
               </div>
       </div>
   </div>
</div>
