<?php
	session_start();
	if(isset($_SESSION['b13number'])){
		header('location:home.php');
	}
	include'../config/config.php';
	$phone_number="Phone Number";
	$match_password="Confirm Password";
	if(isset($_POST['submit'])){
		$usar_name=$_POST['usarname'];
		$number=$_POST['phone'];
		$password=$_POST['password'];
		$con_password=$_POST['confirm_password'];
		$select="select * from usar where b13number='".$number."'";
		$query=mysqli_query($db,$select);
		$row=mysqli_fetch_assoc($query);
		$count=mysqli_num_rows($query);
		if($count>0){
			$input_erorr="input_red";
			$phone_number="This Number Is Alredy Exist";
		}
		elseif($password!=$con_password){
			$password_erorr="input_red";
			$match_password="Password Not Match";
		}
		else{
		$img_name=$_FILES['img']['name'];
		$rand=rand(0000,9999);
		$img_new_name=$rand.$img_name;
		$tmp=$_FILES['img']['tmp_name'];
		move_uploaded_file($tmp,'../imgs/usar_image/'.$img_new_name);
		$insert="insert into usar(usar_name,image,b13number,password,balance)values('".$usar_name."','".$img_new_name."','".$number."','".$password."',0)";
		$query=mysqli_query($db,$insert);
		if($query){
			header('location:login.php');
		}
		}
	}
?>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="../css/signup.css" type="text/css"/>
	<!--ajax start src-->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/ajax_img_priview.js"></script>
	<!--ajax end src-->
</head>
<body>
	<div class="signup-section">
	<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
		<div class="signup-top">
			<div class="logo">b13</div>
			<div class="profil">
				<label for="file" id="image_preview"><img id="previewing" src="../imgs/profile.png"  /></label>
				<input  id="file" class="profile_img_up" type="file" name="img">
			</div>
		</div>
		<div class="signup-middle">

			<div class="username">
				<input type="text" placeholder="username" name="usarname"/>
			</div>
			<div class="phone">
				<input type="tel" maxlength="11" 
				placeholder="<?php echo $phone_number?>" 
				name="phone" class="<?php echo $input_erorr?>"/>
			</div>
			<div class="password">
				<input type="tel" maxlength="5" placeholder="Password" name="password"/>
			</div>
			<div class="password">
				<input type="tel" maxlength="5" placeholder="<?php echo $match_password?>" name="confirm_password" class="<?php echo $password_erorr?>"/>
			</div>
			<div class="signup">
				<input type="submit" value="Signup" name="submit"/>
			</div>
		</div>
		<div class="signup-bottom">
			<div class="login-btn">
				<p>Have An Account ?</p>
				<a href="login.php">Login</a>
			</div>
		</div>
	</form>
	</div>
	<script type="text/javascript">
		
	</script>
	<script src="../js/signup.js" type="text/javascript"></script>
</body>
</html>