<?php 
	include'../assets/config/config.php';
	session_start();
	if(isset($_SESSION['b13agent_number'])){}
	else{
		header('location:agentlogin.php');
	}
	$number=$_SESSION['b13agent_number'];
?>
<!---agent massage section start--->
	<div style="width:50%;height:250px;background:red;">
	<div class="notice-box">
	<?php 
		$select="select * from massage where b13number='".$number."'&&status=1 order by id DESC";
		$query=mysqli_query($db,$select);
		while($row=mysqli_fetch_assoc($query)){
		$id=$row['id'];
		$title=$row['title'];
		$time=$row['time'];
		$color=$row['color'];
		if($color=='#fff'){
			$seen='Seen';
		}
		else{
			$seen='Unseen';
		}
	?>
		<div class="single-notice" id="open_notice" onclick="window.location.href='agentmessage.php?id=<?php echo $id?>'" style="background:<?php echo $color?>;">
			<div class="logo">
			<img src="" alt="">
			</div>
			<div class="notic-sub">
			<span><?php echo $title?></span>
			</div>
			<div class="date">
			<span><?php echo $time?></span>
			<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $seen?></span>
			</div>
		</div>
		<?php }?>
		<?php
		$select="select * from massage where b13number='".$number."'&&status=1";
		$query=mysqli_query($db,$select);
		$row=mysqli_fetch_assoc($query);
		if(empty($row)){
			echo '
		<div class="empty_notice">
			<h2>Empty</h2>
		</div>
		';}?>
	</div>
	</div>
	<!---agent massage display section end--->