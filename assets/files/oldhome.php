<?php 
	include'../config/config.php';
	session_start();
	$number=$_SESSION['b13number'];
	if(isset($_SESSION['b13number'])){
	$select="select * from usar where b13number='".$number."'";
	$query=mysqli_query($db,$select);
	$row=mysqli_fetch_assoc($query);
	$name=$row['usar_name'];
	$password=$row['password'];
	$number=$row['b13number'];
	$image=$row['image'];
	}
	else{
		header('location:/b13/index.php');
	}
	if(isset($_POST['logout'])){
		session_unset();
		header('refresh:0');
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	
</head>
<body>

	<h1>My Profile</h1>
	<div style="height:200px;width:200px;background:green;color:#fff;float:left">
		<?php echo $name?>
	</div>
	
	<div style="height:200px;width:200px;background:red;color:#fff;float:left">
		<?php echo $number?>
	</div>
	
	<div style="height:200px;width:200px;background:blue;color:#fff;float:left">
		<?php echo $password?>
	</div>
	
	<div style="height:200px;width:200px;background:orange;color:#fff;float:left">
		<img src="images/<?php echo $image?>" width="200" height="200"/>
	</div>
	<form action="" method="post">
		<input type="submit" value="logout" name="logout"/>
	</form>
</body>
</html>