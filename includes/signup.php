<?php

include_once("user.php");

$u_error = ''; $e_error = ''; $p2_error = ''; $p1_error = ''; $pl_error = ''; $cp_error = ''; $t_error = '';
$user = new User();
if(isset($_POST['save'])){
	$username = ucwords($_POST['username']);
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$usertype = $_POST['select'];
	if (empty($username)) {
		$u_error =  "<span class='text-danger'>Please Enter your full name</span>";
		return $u_error;

	}elseif (empty($email)) {
		$e_error =  "<span class='text-danger'>Please Enter your email</span>";
		return $e_error;

	}elseif (empty($password)) {
		$p1_error =  "<span class='text-danger'>Please Enter your password</span>";
		return $p1_error;

	}elseif (strlen($password) < 6) {
		$pl_error =  "<span class='text-danger'>The password should be more than 5 characters</span>";
		return $pl_error;

	}elseif (empty($cpassword)) {
		$p2_error =  "<span class='text-danger'>Please Enter your confirm password</span>";
		return $p2_error;

	}elseif ($password != $cpassword) {
		$cp_error =  "<span class='text-danger'>your confirm passwprd does not match</span>";
		return $cp_error;

	}elseif(empty($usertype)) {
		$t_error =  "<span class='text-danger'>Please select user type</span>";
		return $t_error;

	}else{
		

	    $user->createAccount($username, $email,$password, $usertype);
	    //$user->createAccount($_POST['username'], $_POST['email'], $_POST['password'], $_POST['usertype']);
	}
	

}
