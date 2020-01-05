<?php require_once("templates/top.php"); ?>
<?php require_once("includes/signup.php"); ?>

<body style="padding: 5px;">

 <?php require_once("templates/navbar.php"); ?>
 		 <div class="container">
 		 <center><?php  if(isset($_GET['error'])){ echo "<div class='alert alert-danger alert-dismissible fade show text-danger w-100' role='alert'>The email address already registered !! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"; }else if(isset($_GET['success'])) {
         	  echo "<div class='alert alert-success alert-dismissible fade show text-success' role='alert'>You are registered successfully !! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";} ?> </center>
		  <div class="card mx-auto" style="width: 30rem;">
		  	<div class="card-header bg-primary text-white text-center">Register for New Account</div>
		     <div class="card-body">
		     <form id="signupform" action="signup.php" method="POST" autocomplete="">
		       <div class="form-group">
	              <label for="username">Username:</label>
	              <input type="text" class="form-control" name="username" id="username" placeholder="Username">
	              <small><?= $u_error; ?></small>
	           </div>
	           <div class="form-group">
	              <label for="email">Email:</label>
	              <input type="text" class="form-control" name="email" id="email" placeholder="exampl@gmail.com">
					<small><?= $e_error; ?></small>
	           </div>
	           <div class="form-group">
	              <label for="password">Password:</label>
	              <input type="password" class="form-control" name="password" id="password1" placeholder="Enter Your Password">
	              <small><?= $p1_error; ?><?= $pl_error; ?></small>
	           </div>
	           <div class="form-group">
	              <label for="password">Confirm Password:</label>
	              <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter Your Password">
	              <small><?= $cp_error; ?><?= $p2_error; ?></small>
	           </div>
	           <div class="form-group">
	              <label for="select">User Type:</label>
	              <select name="select" class="form-control" id="select">
	              	<option value="">Select User Type</option>
	              	<option value="Admin">Admin</option>
	              	<option value="Other">Other</option>
	              </select>
				<small><?= $t_error; ?></small>
	           </div>
	           <div class="form-group">
	             <center><input type="submit" name="save" class="btn btn-primary" value="Register">&nbsp;&nbsp;&nbsp;
	              <a href="login.php" class="primary">Already Registered </a>
	            </center>
	           </div>
	          </form>
		     </div>
		     <div class="card-footer"></div>
		  </div>
		</div>
 
 <?php require_once("templates/footer.php"); ?>
 