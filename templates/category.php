
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
         </div>
          <div class="modal-body">
            <form id="cat-form" onsubmit="return false" method="POST" action="process.php">
               <div class="form-group">
                  <label for="parent_cat">Parent Category:</label>
                  <select class="form-control" name="parent_cat" id="parent_cat"></select>
               </div>
               <div class="form-group">
                  <label for="category">Category / Subcategory Name:</label>
                  <input type="text"  name="category" id="category_name" class="form-control text-muted" placeholder="Please Enter Category or Subcategory">
                  <small id="cat_error"></small><small id="sub_error"></small>
               </div>
               <div class="form-group">
                 <label for="status">Enable</label>
                 <input type="checkbox" name="status" id="status" value="1">
               </div>
               <button type="submit" name="save" class="btn btn-primary float-right">Save Details</button>

               <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
            </form>
          </div>
           <div class="modal-footer cat-footer w-100">
            
      </div>
    </div>
  </div>
</div>
