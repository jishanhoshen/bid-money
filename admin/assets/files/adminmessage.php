<!---session start--->
<?php 
	include'../../../assets/config/config.php';
	session_start();
	if(isset($_SESSION['admin_number'])){}
	else{
		header('location:assets/files/login.php');
	}
	$id=$_GET['id'];
	$update_color="update massage set color='#fff' where id='".$id."'";
	$color_update=mysqli_query($db,$update_color);
	if(isset($_POST['delete'])){
	$update="update massage set status=0 where id='".$id."'";
	$query_update=mysqli_query($db,$update);
	if($query_update){
		header('location:adminnotification.php');
	}
}
?>
<!---session end--->
<?php 
		$select="select * from massage where id='".$id."'";
		$query=mysqli_query($db,$select);
		$row=mysqli_fetch_assoc($query);
		$count=mysqli_num_rows($query);
		$title=$row['title'];
		$from=$row['sm_from'];
		$to=$row['sm_to'];
		$amount=$row['sm_amount'];
		$date=$row['date'];
		$time=$row['time'];
		$name_select="select * from agent where b13agent_number='".$from."'";
		$name_query=mysqli_query($db,$name_select);
		$name_row=mysqli_fetch_assoc($name_query);
		$agent_name=$name_row['agent_name'];
		if($title=='B2B Recived'){
			echo '
				<form action="" method="post">
				<button name="delete">Delete</button>
				</form>
				<h1></h1>
				<p>From:'.$from.'</p>
				<p>Agent: Name:'.$agent_name.'</p>
				<p>B2B Amount: '.$amount.'</p>
				<p>Date,Time:'.$date.' '.$time.'</p>
			';
		}
		else{
			$name_select="select * from agent where b13agent_number='".$to."'";
			$name_query=mysqli_query($db,$name_select);
			$name_row=mysqli_fetch_assoc($name_query);
			$agent_name=$name_row['agent_name'];
			echo '
				<form action="" method="post">
				<button name="delete">Delete</button>
				</form>
				<h1></h1>
				<p>To:'.$to.'</p>
				<p>From:'.$from.'</p>
				<p>Agent: Name:'.$agent_name.'</p>
				<p>B2B Amount: '.$amount.'</p>
				<p>Date,Time:'.$date.' '.$time.'</p>
			';
		}
		
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
	
</body>
</html>