<?php include_once('../database/db.php');

include_once("dbmodel.php");
include_once("manage.php");



//===Fetch Categoryy
if(isset($_POST['getCategory'])){
	$obj = new Dbmodel();
	$rows = $obj->getAllcategory("categories");
	foreach ($rows as $row) {
	  echo "<option value='".$row['cat_id']."'>".$row['category_name']."</option>";
	}
    exit();
}

//===Add Category
if(isset($_POST['parent_cat']) AND  isset($_POST['category'])){
	$obj = new Dbmodel();
	$parent = ucwords($_POST['parent_cat']);
	$category = ucwords($_POST['category']);
	//$status = $_POST['status'];
    $data = $obj->addCategory($parent , $category);
    echo $data;
    exit();
   	
}
//============Fetch Brand
if(isset($_POST['getBrand'])){
	$obj = new Dbmodel();
	$rows = $obj->getAllBrands("brands");
	foreach ($rows as $row) {
	  echo "<option value='".$row['brand_id']."'>".$row['brand_name']."</option>";
	}
    exit();
}

//============Add Brand
if(isset($_POST['brand_name'])){
    $obj = new Dbmodel();
	$brand = ucwords( $_POST['brand_name']);
	$data = $obj->addBrand($brand);
	echo $data;
	exit();

}

// ====Add Product
if(isset($_POST['created_at']) AND isset($_POST['product_name'])){
	$obj = new Dbmodel();
	$product_name = ucwords($_POST['product_name']);
	$cat_id = $_POST['select_cat'];
	$brand_id = ucwords($_POST['select_brand']);
	$product_price = $_POST['product_price'];
	$product_stock = $_POST['quantity'];

	$data = $obj->addProduct($cat_id,$brand_id,$product_name,$product_price,$product_stock);
	echo $data;
	exit();

}

// ========Manage Category list 
if(isset($_POST['manage_category'])){
	$obj = new Manage();
	$pageno = $_POST['pageno'];
	$result = $obj->manageDataWithPagination("categories",$pageno);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if(count($rows) > 0){
		$index = (($pageno -1) * 5)+1;
		foreach($rows as $row ){
			?>
			  <tr>
		        <td><?= $index++; ?></td>
		        <td><?= $row['category']; ?></td>
		        <td><?= $row['subcategory']; ?></td>
		        <td align="center">
		        	<a href="#" class="btn btn-info btn-sm">Active</a>
		        </td>
		        <td align="center">
		        	<a href="#" edit_id="<?php echo $row['cat_id']; ?>" data-toggle="modal" data-target="#update-category" class="btn btn-success btn-sm edit_cat">Edit</a>
		        </td>
		        <td align="center">
		        	<a href="#" del_id="<?php echo $row['cat_id']; ?>"  class="btn btn-danger btn-sm del_cat">Delete</a>
		        </td>
		      </tr>
		<?php } ?>
           <tr><td colspan="5"><?= $pagination; ?></td></tr>
        <?php
		   exit();
	}


}

//Delete Category
if(isset($_POST['delete_category'])){
	$obj = new Manage();
	$id = $_POST['id'];
	$result = $obj->delete_category("categories","cat_id", $id);
	echo  $result;
}

//Update Category
if(isset($_POST['updateCategory'])){
	$obj = new Manage();
	$id = $_POST['id'];
	$result = $obj->get_single_record("categories","cat_id", $id);
	echo json_encode($result);
	exit();

}

if(isset($_POST['update_category'])){
	$obj = new Manage();
	$cat_id = $_POST['cat_id'];
	$category = ucwords($_POST['update_category']);
	$parent = ucwords($_POST['parent_cat']);
	$result = $obj->update_record("categories",['cat_id'=>$cat_id],['parent_cat'=>$parent,"category_name"=>$category,"status"=>1]);
	echo $result;

}

// ========Manage Category list 
if(isset($_POST['manage_brand'])){
	$obj = new Manage();
	$pageno = $_POST['pageno'];
	$result = $obj->manageDataWithPagination("brands",$pageno);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if(count($rows) > 0){
		$index = (($pageno -1) * 5)+1;
		foreach($rows as $row ){
			?>
			  <tr>
		        <td><?= $index++; ?></td>
		        <td><?= $row['brand_name']; ?></td>
		        <td align="center">
		        	<a href="#" class="btn btn-info btn-sm">Active</a>
		        </td>
		        <td align="center">
		        	<a href="#" edit_id="<?php echo $row['brand_id']; ?>" data-toggle="modal" data-target="#brand-form" class="btn btn-success btn-sm edit_brand">Edit</a>
		        </td>
		        <td align="center">
		        	<a href="#" del_id="<?php echo $row['brand_id']; ?>"  class="btn btn-danger btn-sm del_brand">Delete</a>
		        </td>
		      </tr>
		   <?php } ?>
           <tr><td colspan="5"><?= $pagination; ?></td></tr>
           <?php
		   exit();
	}
}

//Delete Brand
if(isset($_POST['delete_brand'])){
	$obj = new Manage();
	$id = $_POST['id'];
	$result = $obj->delete_category("brands","brand_id", $id);
	echo  $result;
}

//Update Brand
if(isset($_POST['updateBrand'])){
	$obj = new Manage();
	$id = $_POST['id'];
	$result = $obj->get_single_record("brands","brand_id", $id);
	echo json_encode($result);
	exit();

}

if(isset($_POST['update_brand'])){
	$obj = new Manage();
	$brand_id = $_POST['brand_id'];
	$brand = ucwords($_POST['update_brand']);
	$result = $obj->update_record("brands",['brand_id'=>$brand_id],["brand_name"=>$brand,"status"=>1]);
	echo $result;

}

// ========Manage product list 
if(isset($_POST['manage_product'])){
	$obj = new Manage();
	$pageno = $_POST['pageno'];
	$result = $obj->manageDataWithPagination("products",$pageno);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if(count($rows) > 0){
		$index = (($pageno -1) * 5)+1;
		foreach($rows as $row ){
			?>
			  <tr>
		        <td><?= $index++; ?></td>
		        <td><?= $row['product_name']; ?></td>
		        <td><?= $row['category_name']; ?></td>
		        <td><?= $row['brand_name']; ?></td>
		        <td><?= $row['product_price']; ?></td>
		        <td><?= $row['product_stock']; ?></td>
		        <td><?= $row['created_at']; ?></td>
		        <td><?= $row['p_status']; ?></td>
		        <td align="center">
		        	<a href="#" class="btn btn-info btn-sm">Active</a>
		        </td>
		        <td align="center">
		        	<a href="#" edit_id="<?php echo $row['p_id']; ?>" data-toggle="modal" data-target="#product_form" class="btn btn-success btn-sm edit_product">Edit</a>
		        </td>
		        <td align="center">
		        	<a href="#" del_id="<?php echo $row['p_id']; ?>"  class="btn btn-danger btn-sm del_product">Delete</a>
		        </td>
		      </tr>
		   <?php } ?>
           <tr><td colspan="11"><?= $pagination; ?></td></tr>
           <?php
		   exit();
	}
}

//Delete product
if(isset($_POST['delete_product'])){
	$obj = new Manage();
	$id = $_POST['id'];
	$result = $obj->delete_category("products","p_id", $id);
	echo  $result;
}

//Update product
if(isset($_POST['updateProduct'])){
	$obj = new Manage();
	$id = $_POST['id'];
	$result = $obj->get_single_record("products","p_id", $id);
	echo json_encode($result);
	exit();

}

if(isset($_POST['update_product'])){
	$obj = new Manage();
	$p_id = $_POST['p_id'];
	$product_name  = ucwords($_POST['update_product']);
	$cat_id        = $_POST['select_cat'];
	$brand_id      = ucwords($_POST['select_brand']);
	$product_price = $_POST['product_price'];
	$product_stock = $_POST['quantity'];
	$created_at = date('Y-m-d');
	$result = $obj->update_record("products",
		['p_id'=>$p_id],
		["cat_id"=>$cat_id,
		 "brand_id"=>$brand_id,
		 "product_name"=>$product_name,
		 "product_price"=>$product_price,
		 "product_stock"=>$product_stock,
		 "created_at"=>$created_at,
		]);
	echo $result;

}

// ======================================Order Process===================================

if(isset($_POST['FetchNewOrderItem'])){
	$obj = new Dbmodel();
	$rows = $obj->getAllcategory("products");
	?>
		<tr>
			<td class="form-control form-control-sm"><b class="number">1</b></td>
			<td>
				<select name="p_id[]" id="product" class="form-control form-control-sm p_id" required>
					<option value="">Select Product </option>
					<?php
					  foreach ($rows as $row) {
					  	?>
					  	<option value="<?= $row['p_id']; ?>"><?= $row['product_name']; ?></option>
					  	<?php 
					  }

					?> 
					<span id="pr_error"></span>
			    </select>
		    </td>
		    <td><input type="text" name="total_qty[]" class="form-control form-control-sm total_qty" readonly></td>
		    <td><input type="text" name="qty[]" id="qty" class="form-control form-control-sm qty" required> <span id="q_error"></span></td>
		    <td><input type="text" name="price[]" class="form-control form-control-sm price" readonly></td>
		    <td><input type="hidden" name="pro_name[]" class="form-control form-control-sm pro_name"></td>
		    <td class="form-control form-control-sm">Rs. <span class="amt" >0.00</span></td>
		</tr>
	<?php
	exit();
}

//Get price and Quantity

if (isset($_POST['get_price_qty'])) {
	$obj = new Manage();
	$data = $obj->get_single_record("products","p_id", $_POST['id']);
	echo json_encode($data);
}


// Order data stoing
if(isset($_POST['order_date']) AND isset($_POST['customer_name'])){
	 $obj = new Manage();
	 $order_date = $_POST['order_date'];
	 $customer_name = ucwords($_POST['customer_name']);
// in array
	 $arr_total_qty = $_POST['total_qty'];
	 $arr_qty = $_POST['qty'];
	 $arr_price = $_POST['price'];
	 $arr_pro_name = $_POST['pro_name'];


	 $sub_total = $_POST['sub_total'];
	 $gst = $_POST['gst'];
	 $discount = $_POST['discount'];
	 $net_total = $_POST['net_total'];
	 $paid = $_POST['paid'];
	 $due = $_POST['due'];
	 $payment_method = $_POST['payment_method'];

	 $order_data = $obj->save_customer_order_invoice($order_date,$customer_name,$arr_total_qty,$arr_qty,$arr_price,$arr_pro_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_method);
	 echo $order_data;
}