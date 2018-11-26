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
	if(isset($_POST['cashout_sbt'])){
		$password=$_POST['cashout_password'];
		$match_password="select * from usar where b13number='".$number."'&&password='".$password."'";
		$match_query=mysqli_query($db,$match_password);
		$match_row=mysqli_fetch_assoc($match_query);
		if($match_row){
			$cashout_number=$_POST['cashout_number'];
			$cashout_amount=$_POST['cashout_amount'];
			$usar_balance=$match_row['balance'];
			$usar_name=$match_row['usar_name'];
			$agent="select * from agent where b13agent_number='".$cashout_number."'";
			$agent_query=mysqli_query($db,$agent);
			$agent_row=mysqli_fetch_assoc($agent_query);
			$agent_count=mysqli_num_rows($agent_query);
			$agent_name=$agent_row['agent_name'];
			if($agent_count>0){
				if($usar_balance<$cashout_amount){
					echo '<script type="text/javascript">alert("balance running low")</script>';
				}
				else{
				$agent_account=$agent_row['balance'];
				$incriment=$agent_account+$cashout_amount;
				$agent_update="update agent set balance='".$incriment."' where b13agent_number='".$cashout_number."'";
				$agent_update_query=mysqli_query($db,$agent_update);
				$massage_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('".$cashout_number."','".$agent_name."','1','cashout','".$number."','".$cashout_number."','".$cashout_amount."','".$date."','".$time."','#a7a7a7')";
				$massage_insert_query=mysqli_query($db,$massage_insert);
				$decrement=$usar_balance-$cashout_amount;
				$usar_update="update usar set balance='".$decrement."' where b13number='".$number."'";
				$usar_update_query=mysqli_query($db,$usar_update);
				$usar_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('".$number."','".$usar_name."','1','cashout','".$number."','".$cashout_number."','".$cashout_amount."','".$date."','".$time."','#a7a7a7')";
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
<title>Cashout</title>
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
<div class="cashout_head"><h2>Cash Out</h2></div>
<div class="cashout_body">
<form action="" method="post">
<div class="mobile_no cashout">
<div class="cashout_left">
<i class="fas fa-phone"></i>
</div>
<div class="cashout_right">
<label>Mobile NO</label>
<input type="tel" placeholder="Cash Out From B13 Agent" maxlength="11" name="cashout_number" required />
</div>
</div>
<div class="amount cashout">
<div class="cashout_left">
<i class="fas fa-dollar-sign"></i>
</div>
<div class="cashout_right">
<label>Amount</label>
<input type="tel" placeholder="How Muct Amount" name="cashout_amount" required />
</div>
</div>
<div class="pin cashout">
<div class="cashout_left">
<i class="fas fa-lock"></i>
</div>
<div class="cashout_right">
<label>Password</label>
<input type="password" placeholder="Type Here Your Password" name="cashout_password" required />
</div>
</div>
<div class="cashout_submit">
<input type="submit" Value="Submit" name="cashout_sbt"/>
</div>
</div>
</form>
<?php
include'footer.php';
?>
</body>
</html>