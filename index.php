<?php

session_start();

if(!isset($_SESSION['username']))
{
	$_SESSION['msg']="You must login to view this page";
	header('location:login.php');
}
/*
if(isset($_GET['logout_user']))
{
	$_SESSION=array();
	session_destroy();
	
	header("location : login.php");
}

*/


?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>

	<h1> This is the Homepage</h1>

	<?php
	if(isset($_SESSION['success'])) : ?>

		<div>


		<h3>
      
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);

        ?>

		</h3>

		</div>
 <?php endif ?>

<?php if(isset($_SESSION['username'])) : ?>
 
 <h3> Welcome <strong> <?php echo $_SESSION['username'];?></strong></h3>



<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>



 <button  type="submit" name="logout_user"><a href=logout.php>Log Out</a></button>

<?php endif ?>


 
 
 

</body>
</html>
