<!-- Modal -->
<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="product">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="margin-top: -18px;">
              <form id="product-form" onsubmit="return false" method="POST">
               <div class="form-group">
                  <label for="date">Date:</label>
                  <input type="text"  name="created_at" id="date_id" class="form-control" value="<?=  $date = date('Y-m-d H:i:s');  ?>" readonly>
               </div>
               <div class="form-group" style="margin-top: -15px;">
                  <label for="product_name">Product Name:</label>
                  <input type="text"  name="product_name" id="product_id" class="form-control" placeholder="Please Enter Product Name" >
                  <small id="p_error"></small>
               </div>
               <div class="form-group" style="margin-top: -15px;">
                  <label for="select_cat">Category:</label>
                  <select class="form-control" name="select_cat" id="select_cat_id"  >
                    <!-- <option value="0">Please select category</option> -->
                  </select> 
                  <small id="cat-error"></small> 
               </div>
               <div class="form-group" style="margin-top: -15px;">
                  <label for="select_brand">Brand:</label>
                  <select class="form-control" name="select_brand" id="select_brand_id" >
                    <!-- <option value="0">Please select brand</option> -->
                  </select>
                  <small id="br-error"></small>        
               </div>
               <div class="form-group" style="margin-top: -15px;">
                  <label for="product_price">Product Price:</label>
                  <input type="text"  name="product_price" id="product_price_id" class="form-control" placeholder="Product Price" >
                  <small id="pr-error"></small>
               </div>
               <div class="form-group" style="margin-top: -15px;">
                  <label for="quantity">Quantity:</label>
                  <input type="text"  name="quantity" id="quantity_id" class="form-control" placeholder="Quantity" >
                  <small id="q-error"></small>
               </div>
               <!-- <div class="form-group">
                 <label for="status">Enable</label>
                 <input type="checkbox" name="status" id="status" value="1">
               </div> -->
               <button type="submit" class="btn btn-primary float-right">Save Product</button> 
               <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
            </form>
            </div>
            <div class="modal-footer product-footer w-100">
             
             
          </div>
      </div>
    </div>
  </div>