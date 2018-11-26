<?php
	include('../config/config.php');
	include'header.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<section class="message_header_section">
<a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
</section>
<section class="notification-section">
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
		<div class="single-notice" id="open_notice" onclick="window.location.href='message.php?id=<?php echo $id?>'" style="background:<?php echo $color?>;">
			<div class="logo">
			<img src="" alt="">
			</div>
			<div class="notic-sub">
			<span><?php echo $title?></span>
			</div>
			<div class="date">
			<span><?php echo $time?></span>
			<span>&nbsp;&nbsp;&nbsp;<?php echo $seen?></span>
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
</section>
<?php
include'footer.php';
?>