<?php require_once("templates/top.php"); ?>

<body style="padding: 5px;">

 <?php require_once("templates/navbar.php"); ?>

		<div class="container w-100 main">
         <center><h1 class="bg-primary text-white form-control head">Home</h1></center>
        <div class="row">
         <div class="col-md-6"><img src="images/pic32.jpg" width="100%"></div>
         <div class="col-md-6"><img src="images/pic37.jpg" width="100%"></div>
        </div>  
           <center>
            <div class='alert alert-success w-100' style='color:green;'>
            </div>
           </center>  
          <div class="form-group">
           <center>
             <a href="signup.php" class="btn btn-primary">Register</a>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <a href="login.php" class="btn btn-primary">Login</a>
           </center>   
          </div>
        </div>



<?php require_once("templates/footer.php"); ?>