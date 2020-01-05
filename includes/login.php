<?php include_once("user.php"); 

$e_error =''; $p1_error =''; $pl_error ='';

$user = new User();

if(isset($_POST['save'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (empty($email)) {
		$e_error =  "<span class='text-danger'>Please Enter your email</span>";
		return $e_error;

	}elseif (empty($password)) {
		$p1_error =  "<span class='text-danger'>Please Enter your password</span>";
		return $p1_error;

	}elseif (strlen($password) < 6) {
		$pl_error =  "<span class='text-danger'>The password should be more than 5 characters</span>";
		return $pl_error;

	}else{
		
	    $user->userlogin($email,$password);
	    //$user->createAccount($_POST['username'], $_POST['email'], $_POST['password'], $_POST['usertype']);
	}
	

}
