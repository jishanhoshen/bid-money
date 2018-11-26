<?php
include'../config/config.php';
	date_default_timezone_set('asia/dhaka');
	$date=date('d/m/Y');
	$time=date('h:i:s a');
include'header.php';
?>
<section class="message_header_section">
<a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
</section>
<?php 
	if(isset($_POST['send_money_sbt'])){
		$password=$_POST['send_money_password'];
		$match_password="select * from usar where b13number='".$number."'&&password='".$password."'";
		$match_query=mysqli_query($db,$match_password);
		$match_row=mysqli_fetch_assoc($match_query);
		if($match_row){
			$send_money_number=$_POST['send_money_number'];
			$send_money_amount=$_POST['send_money_amount'];
			$usar_balance=$match_row['balance'];
			$usar_name=$match_row['usar_name'];
			$friend="select * from usar where b13number='".$send_money_number."'";
			$friend_query=mysqli_query($db,$friend);
			$friend_row=mysqli_fetch_assoc($friend_query);
			$friend_count=mysqli_num_rows($friend_query);
			$friend_name=$friend_row['usar_name'];
			if($friend_count>0){
				if($usar_balance<$send_money_amount){
					echo '<script type="text/javascript">alert("balance running low")</script>';
				}
				elseif($number==$send_money_number){
					echo '<script type="text/javascript">alert("you are theif")</script>';
				}
				else{
				$friend_account=$friend_row['balance'];
				$incriment=$friend_account+$send_money_amount;
				$friend_update="update usar set balance='".$incriment."' where b13number='".$send_money_number."'";
				$friend_update_query=mysqli_query($db,$friend_update);
				$friend_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('".$send_money_number."','".$friend_name."','1','recivemoney','".$number."','".$send_money_number."','".$send_money_amount."','".$date."','".$time."','#a7a7a7')";
				$friend_insert_query=mysqli_query($db,$friend_insert);
				$decrement=$usar_balance-$send_money_amount;
				$usar_update="update usar set balance='".$decrement."' where b13number='".$number."'";
				$usar_update_query=mysqli_query($db,$usar_update);
				$usar_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('".$number."','".$usar_name."','1','sendmoney','".$number."','".$send_money_number."','".$send_money_amount."','".$date."','".$time."','#a7a7a7')";
				$usar_insert_query=mysqli_query($db,$usar_insert);
				echo '<script type="text/javascript">alert("transection success")</script>';
				}
			}
			else{
				echo '<script type="text/javascript">alert("number not found")</script>';
			}
		}
		else{
			echo '<script type="text/javascript">alert("Error")</script>';
		}
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Sendmoney</title>
<style>
.cashout_head {
    position: absolute;
    top: 120px;
    left: 0;
    right: 0;
    height: 120px;
    text-align: center;
    line-height: 120px;
    background-color: #ff7008;
}
.cashout_head h2 {
    font-size: 70px;
    font-weight: 700;
    text-transform: capitalize;
    color: #ffffff;
}
.cashout_body {
    position: absolute;
    top: 240px;
    bottom: 120px;
    left: 0;
    right: 0;
	font-size: 90px;
}
.cashout_body input{
	font-size: -webkit-xxx-large;
}
.cashout {
    height: 260px;
}
.cashout_left svg {
    font-size: 45px;
}
.cashout_left {
    float: left;
    width: 12%;
    padding-top: 120px;
    margin-left: 8%;
}
.cashout_right {
    float: right;
    width: 80%;
    padding-top: 30px;
}
.cashout_right label {
    font-size: 50px;
    padding: 0px 100px 0px 20px;
    color: #ddd;
}
.cashout_body input {
    font-size: -webkit-xxx-large;
    box-sizing: unset;
    background-color: white;
    border: none;
    border-bottom: 3px solid #fb6e1c;
    height: 100px;
    padding: 0 30px;
	font-family: cursive;
}
.cashout_body input:focus {
    outline-offset: 0;
    outline: -webkit-focus-ring-color auto 0px;
}
.cashout_submit {
    width: 100%;
    margin: 70px 0px;
}
.cashout_submit input{
	border: 3px solid #fb6e1c;
    border-radius: 50px;
    display: block;
    margin: auto;
    width: 75%;
}
</style>
</head>
<body>
<div class="cashout_head"><h2>Send Money</h2></div>
<div class="cashout_body">
<form action="" method="post">
<div class="mobile_no cashout">
<div class="cashout_left">
<i class="fas fa-phone"></i>
</div>
<div class="cashout_right">
<label>Mobile NO</label>
<input type="tel" placeholder="Send Money To Your Friend" maxlength="11" name="send_money_number" required />
</div>
</div>
<div class="amount cashout">
<div class="cashout_left">
<i class="fas fa-dollar-sign"></i>
</div>
<div class="cashout_right">
<label>Amount</label>
<input type="tel" placeholder="How Muct Amount" name="send_money_amount" required />
</div>
</div>
<div class="pin cashout">
<div class="cashout_left">
<i class="fas fa-lock"></i>
</div>
<div class="cashout_right">
<label>Password</label>
<input type="password" placeholder="Type Here Your Password" name="send_money_password" required />
</div>
</div>
<div class="cashout_submit">
<input type="submit" Value="Submit" name="send_money_sbt"/>
</div>
</div>
</form>
<?php
include'footer.php';
?>
</body>
</html>