<?php
include('../config/config.php');
include'header.php';
		$id=$_GET['id'];
		$update_color="update massage set color='#fff' where id='".$id."'";
		$color_update=mysqli_query($db,$update_color);
if(isset($_POST['delete'])){
	$update="update massage set status=0 where id='".$id."'";
	$query_update=mysqli_query($db,$update);
	if($query_update){
		header('location:notification.php');
	}
}
?>
<form action="" method="post">
<section class="message_header_section">
<a href="notification.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
<div class="message_menu_btn dropdown">
	<i class="fas fa-ellipsis-v"></i>
	<div class="message_menu dropdown-content">
	<button class="delete-btn" name="delete" onclick="return confirm('Are You Sure To Delete This Notice?')">Delete<i class="far fa-trash-alt"></i></button>
	</div>
</div>
</section>
<!--win message start-->
<?php 
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
	if($title=='win'){
		echo '
<section class="open-message" id="open_message">
	<div class="congratulation" style="background-image: url(../imgs/congratulation.png);">
	<p>You Win This Product</p>
	</div>
	<div class="top" id="top" style="background-image: url(../../admin/assets/upload_image/'.$image.');">
		<div class="product-slod" style="background-image: url(../imgs/sold-out-logo.png);"></div>
		<div class="comp-sign">
			BThirteen
		</div>
	</div>
	<div class="bottom" id="bottom">
			<div class="product-title">
				<label for="product-title">product title :</label>
				<p id="product-title">'.$row['product_name'].'</p>
			</div>
			<div class="product-price">
				<label for="product-price">product price :</label>
				<p id="product-price">'.$row['sale_price'].'</p>
			</div>
			<div class="product-winner">
				<label for="product-winner">product winner :</label>
				<p id="product-winner">'.$row['usar_name'].'</p>
			</div>
			<div class="product-winner-id">
				<label for="product-winner-id">winner id :</label>
				<p id="product-winner-id">'.$row['b13number'].'</p>
			</div>
			<div class="product-bid-rate">
				<label for="product-bid-rate">bid rate :</label>
				<p id="product-bid-rate">'.$row['bid'].'</p>
			</div>
	</div>
</section>
</form>
';}
?>
<!--win message end-->
<!--sendmoney message start-->
<?php
	if($title=='sendmoney'){
		$select_name="select * from usar where b13number='".$to."'";
		$select_name_query=mysqli_query($db,$select_name);
		$select_row=mysqli_fetch_assoc($select_name_query);
		$name=$select_row['usar_name'];
		echo '
<section class="open-message transaction" id="open_message">
	<div class="transaction_title">'.$title.'</div>
	<div class="transaction_top"><i class="fas fa-hand-holding-usd"></i></div>
	<div class="bottom" id="bottom">
			<div class="product-winner">
				<label for="product-winner">Account Number :</label>
				<p id="product-winner">'.$to.'</p>
			</div>
			<div class="product-title">
				<label for="product-title">Name :</label>
				<p id="product-title">'.$name.'</p>
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
<!--sendmoney message end-->
<!--recivemoney message start-->
<?php
	if($title=='recivemoney'){
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
<!--cashout message start-->
<?php
	if($title=='cashout'){
		$select_name="select * from massage where b13number='".$to."'";
		$select_name_query=mysqli_query($db,$select_name);
		$select_row=mysqli_fetch_assoc($select_name_query);
		$name=$select_row['usar_name'];
		echo '
<section class="open-message transaction" id="open_message">
	<div class="transaction_title">'.$title.'</div>
	<div class="transaction_top"><i class="fas fa-hand-holding-usd"></i></div>
	<div class="bottom" id="bottom">
			<div class="product-winner">
				<label for="product-winner">Account Number :</label>
				<p id="product-winner">'.$to.'</p>
			</div>
			<div class="product-title">
				<label for="product-title">Name :</label>
				<p id="product-title">'.$name.'</p>
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
<!--cashout message end-->
<!--cashIN message start-->
<?php
	if($title=='cashin'){
		$select_name="select * from massage where b13number='".$from."'";
		$select_name_query=mysqli_query($db,$select_name);
		$select_row=mysqli_fetch_assoc($select_name_query);
		$name=$select_row['usar_name'];
		echo '
<section class="open-message transaction" id="open_message">
	<div class="transaction_title">'.$title.'</div>
	<div class="transaction_top"><i class="fas fa-hand-holding-usd"></i></div>
	<div class="bottom" id="bottom">
			<div class="product-winner">
				<label for="product-winner">Account Number :</label>
				<p id="product-winner">'.$from.'</p>
			</div>
			<div class="product-title">
				<label for="product-title">Name :</label>
				<p id="product-title">'.$name.'</p>
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
<!--cashIN message end-->