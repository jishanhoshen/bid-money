<?php 
	$db=mysqli_connect('localhost','root','','bid_money');
		date_default_timezone_set('asia/dhaka');
		$date=date('d/m/Y');
		$time=date('h:i:s a');
		if(isset($_POST['sbt'])){
			$agent_number=$_POST['mobile'];
			$agent_select="select * from agent where b13agent_number='".$agent_number."'";
			$agent_query=mysqli_query($db,$agent_select);
			$agent_row=mysqli_fetch_assoc($agent_query);
			$agent_name=$agent_row['agent_name'];
			$agent_balance=$agent_row['balance'];
			if($agent_row){
				$amount=$_POST['amount'];
				$amount_select="select * from admin_main_balance";
				$amount_query=mysqli_query($db,$amount_select);
				$amount_row=mysqli_fetch_assoc($amount_query);
				$admin_balance=$amount_row['main_balance'];
				if($admin_balance<$amount){
					echo '<script>alert("Balance Low")</script>';
				}
				else{
					$decriment=$admin_balance-$amount;
					$admin_update="update admin_main_balance set main_balance='".$decriment."'";
					$admin_update_query=mysqli_query($db,$admin_update);
					$incriment=$agent_balance+$amount;
					$agent_update="update agent set balance='".$incriment."' where b13agent_number='".$agent_number."'";
					$agent_update_query=mysqli_query($db,$agent_update);
					$agent_massage_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('".$agent_number."','".$agent_name."','1','B2B Recevied','Admin','".$agent_number."','".$amount."','".$date."','".$time."','unseen')";
					$agent_massage_query=mysqli_query($db,$agent_massage_insert);
					
					
					$admin_massage_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('bthirteen','admin','1','B2B send','Admin','".$agent_number."','".$amount."','".$date."','".$time."','unseen')";
					$admin_massage_query=mysqli_query($db,$admin_massage_insert);
				}
			}
			else{
				echo '<script>alert("Agent Not Found")</script>';
			}
		}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
	<form action="" method="post">
		Number:<input type="text" name="mobile"/><br><br>
		Amount:<input type="text" name="amount"/><br><br>
		<input type="submit" name="sbt"/>
	</form>
</body>
</html>