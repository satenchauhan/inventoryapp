<!-- Modal -->
<div class="modal fade" id="brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="brand">Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
           </button>
          </div>
          <div class="modal-body">
            <form id="brand-form" onsubmit="return false" method="POST">
               <div class="form-group">
                  <label for="category">Brand Name:</label>
                  <input type="text"  name="brand_name" id="brand-id" class="form-control" placeholder="Please Enter Brand">
                  <small id="b-error"></small>
               </div>
               <button type="submit"  name="save" class="btn btn-primary float-right">Save Brand</button>
               
               <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
            </form>
          </div>
          <div class="modal-footer brand-footer w-100">
            
           
        </div>
     </div>
  </div>
</div>