<!---session start--->
<?php 
	include'../../../assets/config/config.php';
	session_start();
	if(isset($_SESSION['admin_number'])){}
	else{
		header('location:login.php');
	}
?>
<!---session end--->
<?php 
		$select="select * from massage where b13number='bthirteen'&&status='1'";
		$query=mysqli_query($db,$select);
		while($row=mysqli_fetch_assoc($query)){
		$count=mysqli_num_rows($query);
		$title=$row['title'];
		$date=$row['date'];
		$time=$row['time'];
		$id=$row['id'];
	?>
	<a href="adminmessage.php?id=<?php echo $id?>"><div style="width:200px;height:100px;background:red">
		<p><?php echo $title?></p>
		<p><?php echo $date.' '.$time?></p>
	</div></a>
		<?php }?>