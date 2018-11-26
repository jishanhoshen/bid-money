<?php 
	include'../assets/config/config.php';
	session_start();
	if(isset($_SESSION['b13agent_number'])){}
	else{
		header('location:agentlogin.php');
	}
	/*massage update and delete section start*/
		$id=$_GET['id'];
		$update_color="update massage set color='#fff' where id='".$id."'";
		$color_update=mysqli_query($db,$update_color);
	if(isset($_POST['delete'])){
	$update="update massage set status=0 where id='".$id."'";
	$query_update=mysqli_query($db,$update);
	if($query_update){
		header('location:index.php');
	}
	}
	/*massage update and delete section end*/
	/*massage information area start*/
	$select="select * from massage where id='".$id."'";
	$query=mysqli_query($db,$select);
	$row=mysqli_fetch_assoc($query);
	$title=$row['title'];
	$image=$row['product_image'];
	$from=$row['sm_from'];
	$to=$row['sm_to'];
	$amount=$row['sm_amount'];
	$date=$row['date'];
	$time=$row['time'];
	/*massage information area end*/
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Agent Massage</title>
</head>
<body>
	<form action="" method="post">
	<div class="message_menu dropdown-content">
	<button class="delete-btn" name="delete" onclick="return confirm('Are You Sure To Delete This Notice?')">Delete<i class="far fa-trash-alt"></i></button>
	</div>
	</form>
<!--recivemoney message start-->
	<?php
	if($title=='cashout'){
		$select_name="select * from usar where b13number='".$from."'";
		$select_name_query=mysqli_query($db,$select_name);
		$select_row=mysqli_fetch_assoc($select_name_query);
		$name=$select_row['usar_name'];
		echo '
<section class="open-message transaction" id="open_message">
	<div class="transaction_title">'.$title.'</div>
	<div class="transaction_top"><i class="fas fa-hand-holding-usd"></i></div>
	<div class="bottom" id="bottom">
			<div class="product-title">
				<label for="product-title">Account Number :</label>
				<p id="product-title">'.$from.'</p>
			</div>
			<div class="product-winner">
				<label for="product-winner">Name :</label>
				<p id="product-winner">'.$name.'</p>
			</div>
			<div class="product-price">
				<label for="product-price">Amount :</label>
				<p id="product-price">'.$amount.'</p>
			</div>
			<div class="product-winner-id">
				<label for="product-winner-id">Date and Time :</label>
				<p id="product-winner-id">'.$date.' '.$time.'</p>
			</div>
	</div>
</section>
	';}
?>
<!--recivemoney message end-->
<!--cashin message start-->
	<?php
	if($title=='cashin'){
		$select_name="select * from usar where b13number='".$to."'";
		$select_name_query=mysqli_query($db,$select_name);
		$select_row=mysqli_fetch_assoc($select_name_query);
		$name=$select_row['usar_name'];
		echo '
<section class="open-message transaction" id="open_message">
	<div class="transaction_title">'.$title.'</div>
	<div class="transaction_top"><i class="fas fa-hand-holding-usd"></i></div>
	<div class="bottom" id="bottom">
			<div class="product-title">
				<label for="product-title">Account Number :</label>
				<p id="product-title">'.$to.'</p>
			</div>
			<div class="product-winner">
				<label for="product-winner">Name :</label>
				<p id="product-winner">'.$name.'</p>
			</div>
			<div class="product-price">
				<label for="product-price">Amount :</label>
				<p id="product-price">'.$amount.'</p>
			</div>
			<div class="product-winner-id">
				<label for="product-winner-id">Date and Time :</label>
				<p id="product-winner-id">'.$date.' '.$time.'</p>
			</div>
	</div>
</section>
	';}
?>
<!--cashin message end-->
<!--B2B message start-->
	<?php
	if($title=='B2B'){
		$select_name="select * from agent where b13agent_number='".$from."'";
		$select_name_query=mysqli_query($db,$select_name);
		$select_row=mysqli_fetch_assoc($select_name_query);
		$name=$select_row['agent_name'];
		echo '
<section class="open-message transaction" id="open_message">
	<div class="transaction_title">'.$title.'</div>
	<div class="transaction_top"><i class="fas fa-hand-holding-usd"></i></div>
	<div class="bottom" id="bottom">
			<div class="product-title">
				<label for="product-title">Account Number :</label>
				<p id="product-title">Admin</p>
			</div>
			<div class="product-winner">
				<label for="product-winner">Name :</label>
				<p id="product-winner">Admin</p>
			</div>
			<div class="product-price">
				<label for="product-price">Amount :</label>
				<p id="product-price">'.$amount.'</p>
			</div>
			<div class="product-winner-id">
				<label for="product-winner-id">Date and Time :</label>
				<p id="product-winner-id">'.$date.' '.$time.'</p>
			</div>
	</div>
</section>
	';}
?>
<!--B2B message end-->
</body>
</html>