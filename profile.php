<?php require_once("templates/top.php");  ?>
<?php if (!isset($_SESSION['loggedin'])) {
   header('Location: index.php');
}  ?>
<body style="padding: 5px;">

 <?php require_once("templates/navbar.php"); ?>

     <div class="container-fluid main">
       <div class="row">
        <div class="col-md-2">
         <h4>Profile</h4><h3 class="text-primary"><?php echo ucwords($_SESSION['loggedin']['username']); ?></h3>
        </div>
         <div class="col-md-8">
          <center>
            <img src="images/user.png" style="width:35%; box-shadow: 0px 0px 15px 1px rgba(61,57,61,0.97);" class="img-thumbnail" name="profile-image" id="profile-image">
          </center><br>
          </div>
          <div class="col-md-2">
          <span class="float-right">
               <a href="dashboard.php" class="btn btn-outline-primary btn-sm">Dashboard</a>&nbsp;
          </span class="float-right"><br><br>
          <span>
             <a href="update.php?edit_id=<?php echo $_SESSION['loggedin']['id']; ?>" class="btn btn-outline-primary btn-sm float-right">Edit Profile</a>
          </span><br><br>
          <span class="float-right">
            <a href="changepass.php?pass_id=<?php echo $_SESSION['loggedin']['id']; ?>" class="btn btn-outline-primary btn-sm float-right">Change Password</a>
          </span>
        </div>
        </div><br><br>
        <div class="row">
        <div class="col-md-12">
         <table class="table table-bordered">
           <tr>
             <th width="10%" class="btn-primary text-white-dark"><b>User ID:</b></th>
             <td><?= $_SESSION['loggedin']['id']; ?></td>
             <th width="15%" class="btn-primary text-white-dark"><b>Country:</b></th>
             <td><?= 'India'; ?></td>
           </tr>
           <tr>
             <th width="15%" class="btn-primary text-white-dark"><b>Full Name:</b></th>
             <td><?= ucwords($_SESSION['loggedin']['username']); ?></td>
             <th width="15%" class="btn-primary text-white-dark"><b>E-mail:</b></th>
             <td><?= $_SESSION['loggedin']['email']; ?></td>
           </tr>
           <tr>
             <th width="15%" class="btn-primary text-white-dark"><b>Join on:</b></th>
             <td><?= ucwords($_SESSION['loggedin']['joined']); ?></td>
             <th width="15%" class="btn-primary text-white-dark"><b>Last Login:</b></th>
             <td><?= $_SESSION['loggedin']['last_login']; ?></td>
           </tr>
         </table>
      </div>
    </div>
   </div>

<?php require_once("templates/footer.php"); ?>
