<?php
require 'connection.php';
session_start();
$wmsg="Wrong Username Or Password";
$emsg="Your email or password is incorrect.";
if(isset($_POST["emailSignIn"])){
	$emsg = "Please fill the required fields";
	$email=$_POST["emailSignIn"];
	$pass=$_POST["password"];
	$sql="SELECT * FROM user WHERE email='" .$email. "' AND password='".$pass."' LIMIT 1";
	$result=mysql_query($sql, $connection);
	$size=mysql_num_rows($result);
	if($size==0){
		header("location:registration.php?msg=$emsg");
	}else{	
		while($row=mysql_fetch_array($result)){
			$name = $row['name'];
			$email = $row['email'];
			$id = $row['id'];
			$_SESSION['name'] = $name;
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $email;
			header("location:home.php");
		}
	}
}

if(isset($_POST["emailSignUp"])){
	$name = $_POST['nameSignUp'];
 	$email = $_POST["emailSignUp"];
	$pass = $_POST["passwordSignUp"];
	$passConfirm = $_POST["passwordSignUpConfirm"];
	 
	$emsg="Your email or password is incorrect.";
	if ($pass == $passConfirm) {
	 	$sql="INSERT INTO user VALUES ('', '$name' , '$email', '$pass')";
	 	$result=mysql_query($sql, $connection);

	 	$sql="SELECT * FROM user WHERE email='" .$email. "' AND password='".$pass."' LIMIT 1";
		$result=mysql_query($sql, $connection);
		$size=mysql_num_rows($result);
		if($size==0){
			header("location:registration.php?msg=$emsg");
		}else{	
			while($row=mysql_fetch_array($result)){
				$name = $row['name'];
				$id = $row['id'];
				$_SESSION['name'] = $name;
				$_SESSION['id'] = $id;
				header("location:home.php");
			}
		}
	 }
}
?>