<?php 
	include'../assets/config/config.php';
	/*catch session start*/
	session_start();
	if(isset($_SESSION['b13agent_number'])){}
	else{
		header('location:agentlogin.php');
	}
	$number=$_SESSION['b13agent_number'];
		date_default_timezone_set('asia/dhaka');
		$date=date('d/m/Y');
		$time=date('h:i:s a');
	/*catch session end*/
	/*agent information start*/
		$select="select * from agent where b13agent_number='".$number."'";
		$query=mysqli_query($db,$select);
		$row=mysqli_fetch_assoc($query);
		$agent_name=$row['agent_name'];
		$agent_number=$row['b13agent_number'];
		$agent_balance=$row['balance'];
	/*agent information end*/
	if(isset($_POST['sbt'])){
		$b2b_amount=$_POST['amount'];
		$password=$_POST['password'];
		$selectpassword="select * from agent where b13agent_number='".$number."'&&agent_password='".$password."'";
		$selectpassword_query=mysqli_query($db,$selectpassword);
		$selectpassword_rows=mysqli_fetch_assoc($selectpassword_query);
		$agent_password_count=mysqli_num_rows($selectpassword_query);
		if($agent_password_count>0){
			if($agent_balance<$b2b_amount){
				echo '<script>alert("Balance Running Low")</script>';
			}
			else{
				$decriment=$agent_balance-$b2b_amount;
				$agent_update="update agent set balance='".$decriment."'";
				$agent_update_query=mysqli_query($db,$agent_update);
				$massage_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('".$number."','".$agent_name."','1','B2B','".$number."','Admin','".$b2b_amount."','".$date."','".$time."','#a7a7a7')";
				$massage_query=mysqli_query($db,$massage_insert);
				$admin_select="select * from admin_main_balance";
				$admin_query=mysqli_query($db,$admin_select);
				$admin_row=mysqli_fetch_assoc($admin_query);
				$admin_balance=$admin_row['main_balance'];
				$incriment=$admin_balance+$b2b_amount;
				$admin_update="update admin_main_balance set main_balance='".$incriment."'";
				$admin_query=mysqli_query($db,$admin_update);
				$admin_massage_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('abcdefghijklm','admin','1','B2B','".$number."','Admin','".$b2b_amount."','".$date."','".$time."','#a7a7a7')";
				$admin_massage_query=mysqli_query($db,$admin_massage_insert);
				echo '<script>alert("Transection Complet")</script>';
			}
		}
		else{
			echo '<script>alert("password Error")</script>';
			}
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>B2B</title>
</head>
<body>
	<h1>B2B to Admin</h1>
	<form action="" method="post">
		<input type="" placeholder="Enter Amount" name="amount"/><br><br>
		<input type="" placeholder="Your Password" name="password"/><br><br>
		<input type="submit" name="sbt"/>
	</form>
</body>
</html>