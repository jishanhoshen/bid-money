<?php
include'../../config/config.php';
		$phone_number="Phone Number";
		$match_password="Conform Password";
		
?>
<html>
<head>
<title>Ajax Image Upload Using PHP and jQuery</title>
<link rel="stylesheet" href="../../css/signup.css" type="text/css"/>
<script src="ajax_cdn.js"></script>
<script src="script.js"></script>
</head>
<body>
<div class="signup-section">
<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
		<div class="signup-top">
			<div class="logo">b13</div>
			<div class="profil">
				<label for="file" id="image_preview"><img id="previewing" src="../../imgs/profile.png"  /></label>
				<div id="selectImage">
				<input type="file" name="file" id="file" class="profile_img_up" />
				</div>
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
		<input type="tel" maxlength="5" placeholder="Password" name="password" />
	</div>
	<div class="password">
		<input type="tel" maxlength="5" placeholder="<?php echo $match_password?>" name="confirm_password" class="<?php echo $password_erorr?>"/>
	</div>
	<div class="signup">
		<input type="submit" value="Signup" class="submit" name="bbb" />
	</div>
</div>
<div class="signup-bottom">
	<div class="login-btn">
		<p>Have An Account ?</p>
		<a href="../login.php">Login</a>
	</div>
<h4 id='loading' >loading..</h4>
<div id="message"></div>
</div>
</form>
<script src="../../js/signup.js"></script>
</div>
</body>
</html>