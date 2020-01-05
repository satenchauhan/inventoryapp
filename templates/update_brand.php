<!-- Modal -->
<div class="modal fade" id="brand-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
           </button>
          </div>
          <div class="modal-body">
            <form id="update_brand_form" onsubmit="return false" method="POST">
               <input type="hidden" name="brand_id" id="brand_id" value="">
               <div class="form-group">
                  <label for="category">Brand Name:</label>
                  <input type="text"  name="update_brand" id="update_brand_id" class="form-control" >
                  <small id="b-error"></small>
               </div>
               <button type="submit" class="btn btn-primary float-right">Update Brand</button>
               
               <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
            </form>
          </div>
          <div class="modal-footer update-brand-footer w-100">
            
           
        </div>
     </div>
  </div>
</div>