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
?>
<?php 
	if(isset($_POST['cashin_sbt'])){
		$password=$_POST['cashin_password'];
		$match_password="select * from agent where b13agent_number='".$number."'&&agent_password='".$password."'";
		$match_query=mysqli_query($db,$match_password);
		$match_row=mysqli_fetch_assoc($match_query);
		if($match_row){
			$cashin_number=$_POST['cashin_number'];
			$cashin_amount=$_POST['cashin_amount'];
			$agent_balance=$match_row['balance'];
			$agent_name=$match_row['agent_name'];
			$usar="select * from usar where b13number='".$cashin_number."'";
			$usar_query=mysqli_query($db,$usar);
			$usar_row=mysqli_fetch_assoc($usar_query);
			$usar_count=mysqli_num_rows($usar_query);
			$usar_name=$usar_row['usar_name'];
			if($usar_count>0){
				if($agent_balance<$cashin_amount){
					echo '<script type="text/javascript">alert("balance running low")</script>';
				}
				else{
				$usar_account=$usar_row['balance'];
				$incriment=$usar_account+$cashin_amount;
				$usar_update="update usar set balance='".$incriment."' where b13number='".$cashin_number."'";
				$uasr_update_query=mysqli_query($db,$usar_update);
				$massage_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('".$cashin_number."','".$usar_name."','1','cashin','".$number."','".$cashin_number."','".$cashin_amount."','".$date."','".$time."','unseen')";
				$massage_insert_query=mysqli_query($db,$massage_insert);
				$decrement=$agent_balance-$cashin_amount;
				$agent_update="update agent set balance='".$decrement."' where b13agent_number='".$number."'";
				$agent_update_query=mysqli_query($db,$agent_update);
				$usar_insert="insert into massage(b13number,usar_name,status,title,sm_from,sm_to,sm_amount,date,time,color)values('".$number."','".$agent_name."','1','cashin','".$number."','".$cashin_number."','".$cashin_amount."','".$date."','".$time."','unseen')";
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
	<title>Cash IN</title>
</head>
<body>
	<h1>Cash IN</h1>
	<form action="" method="post">
		<input type="text" placeholder="Usar Number" name="cashin_number"/><br><br>
		<input type="text" placeholder="Cash in Amount" name="cashin_amount"/><br><br>
		<input type="text" placeholder="Your Password" name="cashin_password"/><br><br>
		<input type="submit" name="cashin_sbt"/>
	</form>
</body>
</html>