<?php 
	include'../config/config.php';
	session_start();
	$number=$_SESSION['b13number'];
	if(isset($_SESSION['b13number'])){
	$select="select * from usar where b13number='".$number."'";
	$query=mysqli_query($db,$select);
	$row=mysqli_fetch_assoc($query);
	$name=$row['usar_name'];
	$password=$row['password'];
	$number=$row['b13number'];
	$image=$row['image'];
	}
	else{
		header('location:login.php');
	}
	if(isset($_POST['logout'])){
		session_unset();
		header('refresh:0');
	}
?>
<link rel="stylesheet" href="../fontawesome/all.css">
<link rel="stylesheet" href="../css/header.css" />
<link rel="stylesheet" href="../css/menubar.css" />
<link rel="stylesheet" href="../css/slider.css" />
<link rel="stylesheet" href="../css/search.css" />
<link rel="stylesheet" href="../css/notification.css" />
<link rel="stylesheet" href="../css/message.css" />
<link rel="stylesheet" href="../css/product_slide/swiper.min.css">
<link rel="stylesheet" href="../css/productlist.css">
<link rel="stylesheet" href="../css/post.css" />
<link rel="stylesheet" href="../css/agentpoint.css" />
<link rel="stylesheet" href="../css/footer.css" />
<link href="https://fonts.googleapis.com/css?family=Meie+Script" rel="stylesheet">
<script type="text/javascript" src="../fontawesome/all.js"></script>
<script type="text/javascript" src="../js/ajax_cdn.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<section class="header-section">
	<div class="nav-icon ico" id="menuslideico" onclick="menuslideon()">
		<i class="fas fa-bars"></i>
		<!--<i class="fas fa-arrow-left"></i>-->
	</div>
	<div class="space ico"></div>
	<div class="space ico"></div>
	<div class="space ico"></div>
	<div class="space ico">
	<a href="search.php"><i class="fas fa-search"></i></a>
	</div>
	<div class="messege-icon ico">
		<a href="notification.php"><i class="far fa-envelope"></i></a>
	</div>
	<div class="space ico">
		<a href="admincall.php"><i class="fas fa-bell"></i></a>
	</div>
	<div class="com-icon ico">
	</div>
</section>
	<?php include'menubar.php';?>