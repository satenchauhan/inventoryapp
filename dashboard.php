<?php session_start();
if (!isset($_SESSION['loggedin'])) {
   header('Location: login.php');
 }
?>
<?php require_once("templates/top.php"); ?>

<body style="padding: 5px;">

 <?php require_once("templates/navbar.php"); ?>

		<div class="container"><br>
		  <div class="row">
		  	<div class="col-md-3">
		  		<div class="card mx-auto" style="width: 17rem;">
				  <img src="./images/user.png" class="card-img-top"  alt="...">
				  <div class="card-body">
				    <p class="card-title"><b>Profile Information</b></p>
				    <p class="card-text"><b>Name :</b> <?= ucwords($_SESSION['loggedin']['username']); ?><br>
				       <b>Role :</b>&nbsp;<?= ucwords($_SESSION['loggedin']['usertype']); ?><br>
				    <b>Joined at :</b>&nbsp;<?= ucwords($_SESSION['loggedin']['last_login']); ?></p>
				    <a href="#" class="btn btn-primary btn-sm">Edit Profile</a>
				    <a href="logout.php" class="btn btn-primary btn-sm float-right">Logout</a>
				  </div>
				</div>
		  	</div>
		  	<div class="col-md-9">
		  		<div class="jumbotron w-80 h-80">
		  			<h1>Welcome Admin</h1>
		  			<div class="row">
		  			 <div class="col-sm-6">
		  			 	<iframe src="http://free.timeanddate.com/clock/i6op51it/n1584/szw210/szh210/hoc09f/hbw0/hfc09f/cf100/hnce1ead6/fas30/fdi66/mqc000/mql15/mqw4/mqd98/mhc000/mhl15/mhw4/mhd98/mmc000/mml10/mmw1/mmd98/hhs2/hms2/hsv0" frameborder="0" width="210" height="210"></iframe>

		  			 </div>	
		  			 <div class="col-sm-6">
		  			 	<div class="card">
				  		  <div class="card-body">
				    		<h5 class="card-title">Orders</h5>
				    		<p class="card-text">You can add new orders , manage orders</p>
				    		<p class="card-text">Last Login :xxxxxxxxx</p>
				    	 	<a href="new_order.php" class="btn btn-primary">New Order</a>
				          </div>
						</div>
		  			 </div>
		  			</div><br>
			  		<div class="row">
					<div class="col-md-4">
						<div class="card mx-auto" style="width: 20rem;">
					  	  <div class="card-body">
					    	 <h5 class="card-title">Categories</h5>
					    	 <p class="card-text">You can manage categories</p>
					    	 <a href="#" data-toggle="modal" data-target="#category" class="btn btn-success">+ Add </a>
					    	 <a href="category-list.php" class="btn btn-primary">Manage</a>
					      </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card mx-auto" style="width: 20rem;">
					  	  <div class="card-body">
					    	 <h5 class="card-title">Brands</h5>
					    	 <p class="card-text">You can manage brands</p>
					    	 <a href="#" data-toggle="modal" data-target="#brand" class="btn btn-success">+ Add </a>
					    	 <a href="brand-list.php" class="btn btn-primary">Manage</a>
					      </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card mx-auto" style="width: 15rem;">
					  	  <div class="card-body">
					    	 <h5 class="card-title">Products</h5>
					    	 <p class="card-text">You can manage products</p>
					    	 <a href="#" data-toggle="modal" data-target="#product" class="btn btn-success">+ Add </a>
					    	 <a href="product-list.php" class="btn btn-primary">Manage</a>
					      </div>
						</div>
					</div>				
				   </div>		  			
		  	  </div>
		  	</div>
		  </div><br>
		</div>

  <?php require_once("./templates/category.php"); ?>

  <?php require_once("./templates/brand.php"); ?>

  <?php require_once("./templates/product.php"); ?>

  <?php require_once("./templates/footer.php"); ?>

 
 