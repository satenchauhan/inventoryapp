<?php session_start();
if (!isset($_SESSION['loggedin'])) {
   header('Location: login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1,
     shrink-to-fit=no">
     <title>Saten Chauhan </title>

     <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/custom.css">

     
</head>

<body style="padding: 5px;">

 <?php require_once("templates/navbar.php"); ?>
  
	<div class="container">
		 <div class="show-msg w-100">
	      </div><br>
		<h2 class=" btn btn-primary w-100 active">Category and Subcategory Record List</h2>            
		  <table class="table table- table-bordered">
		    <thead>
		      <tr>
		      	<th>Sr No.</th>
		        <th>Product Name</th>
		        <th>Category</th>
		        <th>Brand</th>
		        <th>Price</th>
		        <th>Stock</th>
		        <th>Created at</th>
		        <th width="5%" class="text-center">Status</th>
		        <th colspan="3" width="16%" class="text-center">Action</th>
		      </tr>
		    </thead>
		    <tbody id="products-table">
		      <!-- <tr>
		        <td>1</td>
		        <td>Mobile</td>
		        <td>Samsung J7</td>
		        <td align="center">
		        	<a href="#" class="btn btn-info btn-sm">Status</a>
		        </td>
		        <td align="center">
		        	<a href="edit-category.php" class="btn btn-success btn-sm">Edit</a>
		        </td>
		        <td align="center">
		        	<a href="delete-category.php" class="btn btn-danger btn-sm">Delete</a>
		        </td>
		      </tr> -->
		    </tbody>
		  </table> 
	</div>
 <?php require_once("./templates/update_product.php"); ?>			
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/manage.js"></script>
 	
    	
</body>
</html>

 
 