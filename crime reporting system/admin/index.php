<?php require_once('includes/conn.php');

if(isset($mysqli,$_POST['submit'])){
    $username = mysqli_real_escape_string($mysqli,$_POST['username']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    $password=md5($password);
    $query1=mysqli_query($mysqli,"SELECT username,password,type,permission,name,surname FROM users");
	while($row=mysqli_fetch_array($query1))
	{
        $db_name=$row["name"];
		$db_surname=$row["surname"];
		$db_username=$row["username"];
		$db_password=$row["password"];
		$db_type=$row["type"];
        $db_per=$row["permission"];
		
		if($username==$db_username && $password==$db_password){
			session_start();
			$_SESSION["username"]=$db_username;
			$_SESSION["type"]=$db_type;
            $_SESSION["permission"]=$db_per;
            $_SESSION["name"]=$db_name;
            $_SESSION["surname"]=$db_surname;
			
			if($_SESSION["type"]=='user'){
               
				header("Location:dashboard.php");
			}
		}
		
	
    }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>JCE police |LOGIN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="modal-dialog text-center">
<div class="col-sm-8 main-section">
	<div class="modal-content">

<div class="col-12 user-img">
	<img src="images/logo.jpg">

</div>

<form class="col-12" method="post" action="index.php">
	
<div class="form-group" data-validate="Enter username">
	<input type="text" class="form-controll" name="username" placeholder="username ">
</div>
<div class="form-group" ata-validate = "Enter password">
	<input type="Password" class="form-controll" name="password" placeholder="password">
</div>


<button type="submit" class="btn" name="submit"><i class="fas fa-sign-in-alt"></i>Login</button>

</form>




	</div>
</div>

</div>


  

</body>
</html>
