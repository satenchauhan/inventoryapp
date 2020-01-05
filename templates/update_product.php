<!-- Modal -->
<div class="modal fade" id="product_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="product_form">Update Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="margin-top: 15px;">
              <form id="update_product_form" onsubmit="return false" method="POST">
                 <input type="hidden" name="p_id" id="p_id" value="">
               <!-- <div class="form-group">
                  <label for="date">Date:</label>
                  <input type="text"  name="created_at" id="date_id" class="form-control" readonly>
               </div> -->
               <div class="form-group">
                  <label for="product_name">Product Name:</label>
                  <input type="text"  name="update_product" id="update_product_id" class="form-control" placeholder="Please Enter Product Name" >
                  <small id="p_error"></small>
               </div>
               <div class="form-group">
                  <label for="select_cat">Category:</label>
                  <select class="form-control" name="select_cat" id="select_cat_id"  >
                  </select> 
                  <small id="cat-error"></small> 
               </div>
               <div class="form-group">
                  <label for="select_brand">Brand:</label>
                  <select class="form-control" name="select_brand" id="select_brand_id" >
                  </select>
                  <small id="br-error"></small>        
               </div>
               <div class="form-group">
                  <label for="product_price">Product Price:</label>
                  <input type="text"  name="product_price" id="product_price_id" class="form-control" placeholder="Product Price" >
                  <small id="pr-error"></small>
               </div>
               <div class="form-group pl-2">
                  <label for="quantity">Quantity:</label>
                  <input type="text"  name="quantity" id="quantity_id" class="form-control" placeholder="Quantity" >
                  <small id="q-error"></small>
               </div>
                 <button type="submit" class="btn btn-primary float-right">Update Product</button>
                 <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
            </form>
            </div>
            <div class="modal-footer update-product-footer w-100">
             
             
          </div>
      </div>
    </div>
  </div>