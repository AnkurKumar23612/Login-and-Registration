<?php

session_start();

$username="";
$email="";

$errors=array();

$db=mysqli_connect('localhost','root','ninjacrm','practice') or die("could not connect to databse");


$username=mysqli_real_escape_string($db,$_POST['username']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$password_1=mysqli_real_escape_string($db,$_POST['password_1']);
$password_2=mysqli_real_escape_string($db,$_POST['password_2']);



if(empty($username))
{
	array_push($errors,"Username is required");
}

if(empty($email))
{
	array_push($errors,"Email is required");
}
if(empty($password_1))
{
	array_push($errors,"Password is required");
}

if($password_1!=$password_2)
{
	array_push($errors, "Password do not match");
}


$user_check_query="SELECT * FROM user where username='$username' or email='$email' Limit 1";

$results=mysqli_query($db,$user_check_query);
$user=mysqli_fetch_assoc($results);

if($user)
{
	if($user['username']===$username)
	{
		array_push($errors,"Username already exist");
	}
if($user['email']===$email)
	{
		array_push($errors,"email id has already a registered username ");
	}
}
if(count($errors)==0)
{
	$password=md5($password_1);
	$query="Insert INTO user (username,email,password) VALUES('$username','$email','$password')";

	mysqli_query($db,$query);

	echo "Registration Successfull";

/*
	$_SESSION['username']=$username;
if($_SESSION['success'])
{
	$_SESSION['success']="You are now logged in";
}

*/	

	
}
else{
	echo "Registration Unsuccessfull";
	//include 'errors.php';
	$errors=null;
}

if(isset($_POST['login_user']))
{
	$errors=null;
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$password=mysqli_real_escape_string($db,$_POST['password_1']);

	if(empty($username))
	{
		array_push($errors,"Username is required");
	}

if(empty($password))
	{
		array_push($errors,"Password is required");
	}


if(count($errors)==0)
{
	$password=md5($password);

	$query="SELECT * FROM user where username='$username' and password='$password'";

	$results=mysqli_query($db,$query);

	if(mysqli_num_rows($results))
	{
		$_SESSION['username']=$username;
		$_SESSION['success']="Logged in successfully";
		header('location:index.php');
	}
	else{
		array_push($errors,"erong username and password combination, please try again");
	}
}
}





?>
