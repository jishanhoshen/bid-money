<!---session start--->
<?php 
	include'../../../assets/config/config.php';
	session_start();
	if(isset($_SESSION['admin_number'])){}
	else{
		header('location:../../../assets/files/login.php');
	}
?>
<!---session end--->
<?php 
		if(isset($_POST['sbt'])){
			$title_p=$_POST['title'];
			$rand=rand(00000000,99999999);
			$table_name=$title_p.$rand;
			$Create_table = "CREATE TABLE `$table_name` (
				id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				bid INT(100) NOT NULL,
				usar_name VARCHAR(100) NOT NULL,
				b13number VARCHAR(100) NOT NULL,
				bid_action VARCHAR(100) NOT NULL,
				bider VARCHAR(100) NOT NULL,
				product_image VARCHAR(100) NOT NULL,
				confirm_bid VARCHAR(100) NOT NULL,
				product_name VARCHAR(100) NOT NULL
				)";
			$query=mysqli_query($db,$Create_table);
			$descriptiion_p=$_POST['descriptiion'];
			$purchase_price_p=$_POST['purchase_price'];
			$sale_price_p=$_POST['sale_price'];
			$image_p1=$_FILES['image1']['name'];
			$image_p2=$_FILES['image2']['name'];
			$tmp1=$_FILES['image1']['tmp_name'];
			$tmp2=$_FILES['image2']['tmp_name'];
			
			/*End_time and date for trigger area start*/
			$end_date_date=$_POST['end_date_date'];
			$end_date_month=$_POST['end_date_month'];
			$end_date_year=$_POST['end_date_year'];
			$end_main_date=$end_date_date.'/'.$end_date_month.'/'.$end_date_year;
			$end_time_hour=$_POST['end_time_hour'];
			$end_time_minute=$_POST['end_time_minute'];
			$end_time_am_pm=$_POST['end_time_am_pm'];	 
			$end_main_time=$end_time_hour.':'.$end_time_minute.':00'.$end_time_am_pm;
			/*End_time and date trigger area end*/
			/*Start_time and date for trigger area start*/
			$start_date_date=$_POST['start_date_date'];
			$start_date_month=$_POST['start_date_month'];
			$start_date_year=$_POST['start_date_year'];
			$start_main_date=$start_date_date.'/'.$start_date_month.'/'.$start_date_year;
			$start_time_hour=$_POST['start_time_hour'];
			$start_time_minute=$_POST['start_time_minute'];
			$start_time_am_pm=$_POST['start_time_am_pm'];	 
			$start_main_time=$start_time_hour.':'.$start_time_minute.':00'.$start_time_am_pm;
			/*Start_time and date trigger area end*/
			$main_image1=move_uploaded_file($tmp1,'../../../../jishan/admin/assets/upload_image/'.$image_p1);
			$main_image2=move_uploaded_file($tmp2,'assets/upload_image/'.$image_p2);
			$bid_charge=$_POST['bid_charge'];
			/*insert Query Start*/
			$insert="insert into product(image1,image2,title,descriptiion,purchase_price,sale_price,table_name,start_time,start_date,end_time,end_date,bid_charge,status)values('".$image_p1."','".$image_p2."','".$title_p."','".$descriptiion_p."','".$purchase_price_p."','".$sale_price_p."','".$table_name."','".$start_main_time."','".$start_main_date."','".$end_main_time."','".$end_main_date."','".$bid_charge."','1')";
			$query=mysqli_query($db,$insert);
			/*insert Query End*/
		}
		if(isset($_POST['logout'])){
			unset($_SESSION['b13number']);
			header('refresh:0');
		}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
<form class="form-style-7" action="" method="post" enctype="multipart/form-data">
<ul>
<li>
    <label for="image">image1</label>
    <input type="file" name="image1" required />
    <span>Add Product Image</span>
</li><br><br>
<li>
    <label for="Title">Title</label>
    <input type="text" name="title" maxlength="100" required >
    <span>Product Title</span>
</li><br><br>

<li>
    <label for="price">Purchase Price</label>
    <input type="number" name="purchase_price" maxlength="100" required >
    <span>product price</span>
</li><br><br>
<li>
	<label for="price">Start Time</label>
    <div style="width:150px;height:20px;background:red;">
		<input type="text" placeholder="Hour" name="start_time_hour" maxlength="2" style="width:30px;" required />
		<input type="text" placeholder="Minute" name="start_time_minute" maxlength="2" style="width:40px;" required />
		<select name="start_time_am_pm" style="width:60px;" required >
			<option value="">Select</option>
			<option>am</option>
			<option>pm</option>
		</select>
	</div>
	<span>Start Time</span>
</li><br><br>
<li>
	<label for="price">Start Date</label>
    <div style="width:150px;height:20px;background:red;">
		<input type="text" placeholder="Date" name="start_date_date" maxlength="2" style="width:30px;" required />
		<input type="text" placeholder="Month" name="start_date_month" maxlength="2" style="width:40px;" required />
		<input type="text" placeholder="Year" name="start_date_year" maxlength="4" style="width:40px;" required />
	</div>
	<span>Start Date</span>
</li><br><br>
<li>
    <label for="price">Bid Charge</label>
    <input type="number" name="bid_charge" maxlength="100" required >
    <span>Bid Charge</span>
</li><br><br>
<li>
    
</li>
</ul>
<ul>
<li>
    <label for="image">image</label>
    <input type="file" name="image2" />
    <span>Add Product Image</span>
</li><br><br>
<li>
    <label for="Title">Descriptiion</label>
    <input type="text" name="descriptiion" maxlength="100" required >
    <span>Descriptiion</span>
</li><br><br>

<li>
    <label for="price">Sale Price</label>
    <input type="number" name="sale_price" maxlength="100" required >
    <span>product price</span>
</li><br><br>
<li>
	<label for="price">End Time</label>
    <div style="width:150px;height:20px;background:red;">
		<input type="text" placeholder="Hour" name="end_time_hour" maxlength="2" style="width:30px;" required />
		<input type="text" placeholder="Minute" name="end_time_minute" maxlength="2" style="width:40px;" required />
		<select name="end_time_am_pm" style="width:60px;" required>
			<option value="">Select</option>
			<option>am</option>
			<option>pm</option>
		</select>
	</div>
	<span>End Time</span>
</li><br><br>
<li>
	<label for="price">End Date</label>
    <div style="width:150px;height:20px;background:red;">
		<input type="text" placeholder="Date" name="end_date_date" maxlength="2" style="width:30px;" required />
		<input type="text" placeholder="Month" name="end_date_month" maxlength="2" style="width:40px;" required />
		<input type="text" placeholder="Year" name="end_date_year" maxlength="4" style="width:40px;" required />
	</div>
	<span>End Date</span>
</li><br><br>
<li class="form_submit_style">
    <input type="submit" value="Post Now" name="sbt">
</li>
</ul>
</form>
</body>
</html>