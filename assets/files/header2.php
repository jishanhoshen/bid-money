<?php 
	include'../config/config.php';
	$select="select * from usar where b13number='".$number."'";
	$query=mysqli_query($db,$select);
	$row=mysqli_fetch_assoc($query);
	$image=$row['image'];
?>
<link rel="stylesheet" href="../fontawesome/all.css">
<link rel="stylesheet" href="../css/header.css" />
<link rel="stylesheet" href="../css/menubar.css" />
<link rel="stylesheet" href="../css/slider.css" />
<link rel="stylesheet" href="../css/notification.css" />
<link rel="stylesheet" href="../css/product_slide/swiper.min.css">
<link rel="stylesheet" href="../css/post.css" />
<link rel="stylesheet" href="../css/footer.css" />
<link href="https://fonts.googleapis.com/css?family=Meie+Script" rel="stylesheet">
<script type="text/javascript" src="../fontawesome/all.js"></script>
<div class="header-section">
	<div class="nav-icon ico" id="menuslideico" onclick="menuslideon()">
		<i class="fas fa-bars"></i>
		<!--<i class="fas fa-arrow-left"></i>-->
	</div>
	<div class="space ico"></div>
	<div class="space ico"></div>
	<div class="space ico"></div>
	<div class="serch-icon ico">
		<i class="fas fa-search"></i>
	</div>
	<div class="messege-icon ico">
		<i class="far fa-envelope"></i>
	</div>
	<div class="com-icon ico">
		<div class="top-bar-profile">
			<img src="../imgs/usar_image/<?php echo $image?>" alt="" />
		</div>
	</div>
</div>
<?php include 'menubar.php';?>
