<?php session_start();

if (!isset($_SESSION['loggedin'])) {
   header('Location: login.php');
}

?>
<?php require_once("templates/top.php"); ?>

<body style="padding: 5px;">

<div class="overlay"><div class="loader"></div></div>

 <?php require_once("templates/navbar.php"); ?>

<div class="container">
 <div class="row">
  <div class="col-md-10 mx-auto">
	<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
		<div class="card-header">
		  <h4>New order</h4>
		</div>
		 <div class="card-body">
			<form id="order-form-data" onsubmit="return false" action="" method="POST">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" align="right">Order Date :</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control form-control-sm" name="order_date" id="order_date" value="<?= date("Y-m-d"); ?>" readonly>
					</div>
				</div>
			    <div class="form-group row">
					<label class="col-sm-3 col-form-label" align="right">Cutsomer Name :</label>
					<div class="col-sm-6">
					  <input type="text" name="customer_name" class="form-control form-control-sm" id="customer_name" placeholder="Customer name" required>
					  <span id="c_error"></span>
					</div>
				</div>
				<div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
					<div class="card-header">
		              <h4>Make order list</h4>
		            </div>
					<div class="card-body">
						<table align="center" width="800px;">
							<thead class="bg-secondary text-white">
								<tr>
									<th>&nbsp;Sr no.</th>
									<th style="text-align: center;">Item Name</th>
									<th style="text-align: center;">Total Quantity</th>
									<th style="text-align: center;">Quantity</th>
									<th style="text-align: center;">Price</th>
									<th></th>
									<th style="text-align: center;">Total</th>
								</tr>
							</thead>
							<tbody id="invoice_item" style="margin-top: 10px;">
								<!-- <tr>
									<td class="form-control form-control-sm"><b id="number">1</b></td>
									<td>
										<select name="p_id[]" class="form-control form-control-sm" required>
									      <option>Washing Machine</option> 
									    </select>
								    </td>
								    <td><input type="text" name="total_qty[]" class="form-control form-control-sm" readonly></td>
								    <td><input type="text" name="qty[]" class="form-control form-control-sm" required></td>
								    <td><input type="text" name="price[]" class="form-control form-control-sm" readonly></td>
								    <td class="form-control form-control-sm">Rs. 1540</td>
								</tr> -->
							</tbody>
						</table>
						<center style="padding-top: 30px;">
						  <button id="add" style="width: 100px;" class="btn btn-success">+ Add</button>
						   <button id="remove" style="width: 100px;" class="btn btn-danger">- Remove</button>
						</center>
					</div>
				</div>
				<p></p>
				<div class="form-group row">
					<label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total :</label>
					<div class="col-sm-6">
					  <input type="text" name="sub_total" id="sub_total" class="form-control form-control-sm" required readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="gst" class="col-sm-3 col-form-label" align="right">GST(18%) :</label>
					<div class="col-sm-6">
					  <input type="text" name="gst" id="gst" class="form-control form-control-sm" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="discount" class="col-sm-3 col-form-label" align="right">Discount :</label>
					<div class="col-sm-6">
					  <input type="text" name="discount" id="discount" class="form-control form-control-sm" required>
					  <span id="d_error" style='margin-top: -20px'></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total :</label>
					<div class="col-sm-6">
					  <input type="text" name="net_total" id="net_total" class="form-control form-control-sm" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="paid" class="col-sm-3 col-form-label" align="right">Paid :</label>
					<div class="col-sm-6">
					  <input type="text" name="paid" class="paid" id="paid" class="form-control form-control-sm" required>
					  <span id="paid_error" style='margin-top: -20px'></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="due" class="col-sm-3 col-form-label" align="right">Due :</label>
					<div class="col-sm-6">
					  <input type="text" name="due" id="due" class="form-control form-control-sm" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="payment_method" class="col-sm-3 col-form-label" align="right">Payment Method :</label>
					<div class="col-sm-6">
					  <select  name="payment_method" id="payment_method" class="form-control form-control-sm">
					  	<option>Cash</option>
					  	<option>Card</option>
					  	<option>Draft</option>
					  	<option>Cheque</option>
					  </select>
					</div>
				</div>
				<center>
					<input type="submit" id="order_form" class="btn btn-info btn-sm" value="Save Order and Invoice">
					<input type="submit" id="print-invoice" class="btn btn-success d-none" value="Print Invoice">
				</center>
			</form>
		 </div>
		 <div class="modal-footer order-footer w-100">
                
         </div>
	  </div>
    </div>
  </div>
</div>

  <?php require_once("./templates/category.php"); ?>

  <?php require_once("./templates/brand.php"); ?>

  <?php require_once("./templates/product.php"); ?>

  <?php require_once("./templates/footer.php"); ?>

 
 