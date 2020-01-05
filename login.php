<?php require_once("templates/top.php"); ?>
<?php require_once("includes/login.php"); ?>

<body style="padding: 5px;">

 <?php require_once("templates/navbar.php"); ?>
		<div class="container">
		    <center><?php  if(isset($_GET['not_exist'])){ echo "<div class='alert alert-danger text-danger w-100'>The email address is not registered !! <button type='button' class='close' data-dismiss='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
             </div>";}
             if(isset($_GET['failed'])) { echo "<div class='alert alert-danger text-danger'>Login is failed! The password does not match !! <button type='button' class='close' data-dismiss='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";} ?> </center> 
		  <div class="card mx-auto" style="width: 30rem;">
		    <center><img src="images/login.png" alt="Login" width="180px"></center>
		     <h5 class="card-title text-center">Login Account</h5>
		     <div class="card-body">
		      <form action="" method="POST">
	           <div class="form-group">
	              <label for="email">Email:</label>
	              <input type="text" class="form-control" name="email" id="email" placeholder="exampl@gmail.com">
	              <small><?= $e_error; ?></small>
	           </div>
	           <div class="form-group">
	              <label for="password">Password:</label>
	              <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
	              <small><?= $p1_error; ?><?= $pl_error; ?></small>
	           </div>
	           <div class="form-group">
	             <center><input type="submit" name="save" class="btn btn-primary" value="Login">&nbsp;&nbsp;&nbsp;
	              <span><a href="signup.php" class="text-primary">Register</a></span><br>
	              <a href="forgot-password.php" class="primary">Forgot Password ?</a>
	            </center>
	           </div>
	          </form>
		     </div>
		     <!-- <div class="card-footer"></div>
		  </div> -->
		</div>
  <?php require_once("templates/footer.php"); ?>
 