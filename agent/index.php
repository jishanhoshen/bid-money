<?php 
	include'../assets/config/config.php';
	/*catch session start*/
	session_start();
	if(isset($_SESSION['b13agent_number'])){}
	else{
		header('location:agentlogin.php');
	}
	$number=$_SESSION['b13agent_number'];
	/*catch session end*/
	/*agent information display start*/
	$select="select * from agent where b13agent_number='".$number."'";
	$query=mysqli_query($db,$select);
	$row=mysqli_fetch_assoc($query);
	$name=$row['agent_name'];
	$agent_number=$row['b13agent_number'];
	$image=$row['agent_image'];
	$balance=$row['balance'];
	/*agent information display end*/
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>AGENT PROFILE</title>
</head>
<body>
	<!---agent profile display section start--->
	<table border="1">
		<tr>
			<th>Name</th>
			<th>Number</th>
			<th>Picture</th>
			<th>Balance</th>
		</tr>
		<tr>
			<td><?php echo $name?></td>
			<td><?php echo $agent_number?></td>
			<td><?php echo $image?></td>
			<td><?php echo $balance?></td>
		</tr>
	</table><br>
	<!---agent profile display section end--->
	<a href="agentnotification.php">Message</a><br><br>
	
	<!---Cash IN Start--->
	<a href="cashin.php">Cash IN</a><br><br>
	<!---Cash IN End--->
	
	<!---B2B transfer start--->
	<a href="b2b.php">B2B to Admin</a><br><br>
	<!---B2B transfer end--->
	
	
	
	
	
	<!---logout start--->
	<form action="" method="post">
		<button name="logout">Logout</button>
	</form>
	<!---logout end--->
</body>
</html>
<?php 
	if(isset($_POST['logout'])){
		session_unset();
		header('refresh:0');
	}
?>