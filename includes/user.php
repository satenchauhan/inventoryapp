<?php session_start();

include_once('./database/db.php'); 
$error=''; $success='';


class User{

	private $dbcon;

	public function __construct(){
		$db = new Database();
		$this->dbcon = $db->connect();
		
	}

	private function email_exists($email){
		$sql = "SELECT id FROM users WHERE email=?";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("s", $email);
		$stmt->execute() or die($this->dbcon->error);
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			return 1;
		}else{
			return 0;
		}

	}

	public function createAccount($username,$email,$password,$usertype){

		if ($this->email_exists($email)) {
			header('Location: ./signup.php?error');

		}else{
			$str = "10AbzxsdertyqwopukmnbvchgfhMAZXMNLKPRTY1234567890";
			$str = str_shuffle($str);
			$vcode = substr($str, 0, 15);
            $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
			$date = date("Y-m-d");
			$sql = "INSERT INTO `users`(`username`,`email`,`password`,`usertype`,`vcode`,`joined_at`,`last_login`) VALUES(?,?,?,?,?,?,?)";
		    $stmt = $this->dbcon->prepare($sql);
		    $stmt->bind_param("sssssss", $username, $email,$hashed_pass, $usertype,$vcode, $date, $date );
		    $result = $stmt->execute() or die($this->dbcon->error);
		    if($result) {
		        header('Location: ./signup.php?success');
		        exit;
		    }else{
		    	return "Data insertion failed ?";
		    }
		    
		}
		
	}
	public function userlogin($email, $password){
		$sql = "SELECT * FROM `users` WHERE email=?";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("s", $email);
		$stmt->execute() or die($this->dbcon->error);
		$result = $stmt->get_result();
		if($result->num_rows < 1){
			header('Location: ./login.php?not_exist');

		}else{
			$row = $result->fetch_assoc();
			$dehashed_pass = password_verify($password, $row['password']);
			if($password == $dehashed_pass){
				$_SESSION['loggedin'] = [
         	 			'id'       => $row['id'],
         	 			'username' => $row['username'],
         	 			'email'    => $row['email'],
         	 			'usertype'    => $row['usertype'],
         	 			'joined'   => $row['joined_at'],
         	 			'last_login'=> $row['last_login'],
             	 ];
				$last_login = date("Y-m-d h:m:s");
				$stmt = $this->dbcon->prepare("UPDATE `users` SET `last_login`=? WHERE `email`=?");
				$stmt->bind_param("ss",$last_login,$email);
				$result = $stmt->execute() or die($this->dbcon->error);
				if($result){
				  header('Location: ./dashboard.php');
				}

		    }else{
           
              header('Location: ./login.php?failed');

			}
		}
	}


}

//$user =  new User();
//echo $user->createAccount("Raman Kumar","raman@gmail.com","12345","Admin");

//echo $user->userlogin("raman@gmail.com","12345");

//echo "<br>";

//echo $_SESSION['username'];
