<?php
	include'../../config/config.php';
	$image_inquery=0;
	$phone_inquery=0;
	$pass_inquery=0;
if(isset($_FILES["file"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("upload/" . $_FILES["file"]["name"])) {
echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
	$image_inquery=1;

}
}
}
else
{
//echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}
		$usar_name=$_POST['usarname'];
		$number=$_POST['phone'];
		$password=$_POST['password'];
		$con_password=$_POST['confirm_password'];
$select="select * from usar where b13number='".$number."'";
$query=mysqli_query($db,$select);
$row=mysqli_fetch_assoc($query);
$count=mysqli_num_rows($query);
if($count>0){
	echo $phone_number="This Number Is Alredy Exist";
	$input_erorr='error';
}else{
	$phone_inquery=1;
	if($password!=$con_password){
		$password_erorr="input_red";
		echo $match_password="Password Not Match";
	}else{
		$pass_inquery=1;
	}
}
if(($image_inquery==1)&&($phone_inquery==1)&&($pass_inquery==1)){
		$img_name=$_FILES['file']['name'];
		$rand=rand(0000,9999);
		$img_new_name=$rand.$img_name;
		$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
		$targetPath = "upload/".$img_new_name; // Target path where file is to be stored
		$signup_done = move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
	$usar_name=$_POST['usarname'];
	$number=$_POST['phone'];
	$password=$_POST['password'];
	$con_password=$_POST['confirm_password'];
	$date=date('Y-m-d');
	$insert="insert into usar(usar_name,image,b13number,password,balance,date)values('".$usar_name."','".$img_new_name."','".$number."','".$password."',0,'".$date."')";
			$query=mysqli_query($db,$insert);
}else{
	echo'pagol naki tumi';
}
?>