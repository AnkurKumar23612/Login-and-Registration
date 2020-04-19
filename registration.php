<?php include ('server.php')?>


<!DOCTYPE html>
<html>
<head>
	<title> Registration</title>
</head>

<body>
	<div class="container">
     <div class="header">
      <h2>Register</h2>

     </div>

     <form action="registration.php" method="post">

     	<?php include('errors.php') ?>
    
     <div>
     	<label for="username">Username : </label>
     	<input type="text" name="username" required>
     </div>

     <div>
     	<label for="email">Email : </label>
     	<input type="text" name="email" required>
     </div>

     <div>
     	<label for="password">Password : </label>
     	<input type="password" name="password_1" required>
     </div>

     <div>
     	<label for="password">Confirm Password : </label>
     	<input type="password" name="password_2" required>
     </div>

     <button type="submit" name="reg_user">Submit</button>


     <p> Already a User ?<a href="login.php"><b>Login Here</b></a></p>


     </form>
	</div>

</body>
</html>