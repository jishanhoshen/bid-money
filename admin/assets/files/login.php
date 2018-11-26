<?php 
	include'../../../assets/config/config.php';
	session_start();
	$phone_number='Admin Phone Number';
	$inavlid_password='Admin Password';
	if(isset($_POST['submit'])){
		$number=$_POST['phone'];
		$password=$_POST['password'];
		$login="select * from admin where admin_number='".$number."' && password='".$password."'";
		$query=mysqli_query($db,$login);
		$row=mysqli_fetch_assoc($query);
		$count_row=mysqli_num_rows($query);
		$m_number=$row['admin_number'];
		if($count_row>0){
			$_SESSION['admin_number']=$m_number;
			header('location:../../index.php');
		}
		else{
			$phone_number='Error';
			$inavlid_password='Error';
			$input_erorr='input_red';
		}
	}
?>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="../css/login.css" type="text/css"/>
</head>
<body>
	<div class="login-section">
	<form action="" method="post">
		<div class="login-top">
			<div class="logo">b13</div>
			<div class="profil">
				<label for="upload" class="profile_img"></label>
				<div id="upload" class="profile_img_up" type="file" name="profile"></div>
			</div>
		</div>
		<div class="login-middle">
			<div class="phone">
				<input type="tel" maxlength="11" placeholder="<?php echo $phone_number?>" name="phone" class="<?php echo $input_erorr?>"/>
			</div>
			<div class="password">
				<input type="password" maxlength="5" placeholder="<?php echo $inavlid_password?>" name="password" class="<?php echo $input_erorr?>"/>
			</div>
			<div class="login">
				<input type="submit" value="login" name="submit"/>
			</div>
		</div>
		<div class="login-bottom">
			<div class="signup-btn">
			</div>
		</div>
	</form>
	</div>
	<script src="../js/signup.js" type="text/javascript"></script>
</body>
</html>