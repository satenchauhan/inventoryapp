  
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Inventory System</a>
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link text-white" href="index.php"><i class="fa fa-home"></i>&nbsp;Home</a>
            </li>
        <?php if(!isset($_SESSION['loggedin'])){    ?>
            <li class="nav-item">
               <a class="nav-link text-white" href="signup.php">Signup</a> 
            </li>
            <li class="nav-item">
               <a class="nav-link text-white" href="login.php">Login</a>
            </li>
        <?php } ?>
            <li class="nav-item">
               <a class="nav-link text-white" href="dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="profile.php"><i class="fa fa-user"></i>: <?=((isset($_SESSION['loggedin'])? ucwords($_SESSION['loggedin']['username']) :" ")); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="logout.php"><i class="fa fa-power-off"></i>&nbsp;Logout</a>
            </li>
          </ul> 
         </div>
    </div>
  </nav>
  <br><br><br>