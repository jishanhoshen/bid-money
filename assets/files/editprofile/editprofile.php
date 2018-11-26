<?php 
	$db=mysqli_connect('localhost','root','','bid_money');
	session_start();
	$number=$_SESSION['b13number'];
	//start user details
	$select="select * from usar where b13number='".$number."'";
	$query=mysqli_query($db,$select);
	$row=mysqli_fetch_assoc($query);
	$user_password=$row['password'];
	$user_name=$row['usar_name'];
	//end user details
	//change password start
	if(isset($_POST['pass_sbt'])){
		$password=$_POST['password'];
		$password_update="update usar set password='".$password."' where b13number='".$number."'";
		$password_update_query=mysqli_query($db,$password_update);
		if($password_update_query){
			header('refresh:0');
		}
	}
	//change password end
	//change name start
	if(isset($_POST['name_sbt'])){
		$name=$_POST['name'];
		$name_update="update usar set usar_name='".$name."' where b13number='".$number."'";
		$name_update_query=mysqli_query($db,$name_update);
		if($name_update_query){
			header('refresh:0');
		}
	}
	//change name end
	//add id card section start
	if(isset($_POST['id_card_sbt'])){
		$id_card=$_POST['id_card'];
		$own_other=$_POST['own_other'];
		$id_car_update="update usar set id_card='".$id_card."',own_other='".$own_other."' where b13number='".$number."'";
		$id_card_update_query=mysqli_query($db,$id_car_update);
		if($id_card_update_query){
			header('refresh:0');
		}
	}
	//add id card section end
	//add nomini section start
	if(isset($_POST['nomini_sbt'])){
		$nomini_name=$_POST['nomini_name'];
		$nomini_number=$_POST['nomini_number'];
		$nomini_id_card=$_POST['nomini_id_card'];
		$nomini_update="update usar set nomini_name='".$nomini_name."',nomini_number='".$nomini_number."',nomini_id_card='".$nomini_id_card."' where b13number='".$number."'";
		$nomini_query=mysqli_query($db,$nomini_update);
		if($nomini_query){
			header('refresh:0');
		}
	}
	//add nomini section end
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Edit Profile</title>
</head>
<body>
	<form action="" method="post">
		<h1>Change Your Password</h1>
		<input type="text" placeholder="Change Password" value="<?php echo $user_password?>" name="password"/><br><br>
		<input type="submit" value="OK" name="pass_sbt"/><br><br>
		
		<h1>Change Your Name</h1>
		<input type="text" placeholder="Change Name" value="<?php echo $user_name?>" name="name"/><br><br>
		<input type="submit" value="OK" name="name_sbt"/><br><br>
	</form>
	<form action="" method="post">
		<h1>ADD Your National ID Card Number</h1>
		<select name="own_other" required>
			<option value="">Select</option>
			<option value="Own">Own</option>
			<option value="Other">Other</option>
		</select>
		<input type="number" placeholder="ID Card Number" name="id_card"/>
		<input type="submit" value="OK" name="id_card_sbt"/><br><br>
	</form>
	<form action="" method="post">
		<h1>ADD Your Nomini Details</h1>
		<input type="text" placeholder="Place Name" name="nomini_name"/><br><br>
		<input type="number" placeholder="Place Phone Number" name="nomini_number"/><br><br>
		<input type="number" placeholder="Place ID Card Number" name="nomini_id_card"/><br><br>
		<input type="submit" value="OK" name="nomini_sbt"/><br><br>
	</form>
</body>
</html>