<?php 
	$db=mysqli_connect('localhost','root','','bid_money');
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>User Search</title>
	<style type="text/css">
	section.search_seaction {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #ddd;
    z-index: 10;
}
section.search_seaction header {
    height: 120px;
    background-color: #b7b7b7;
}
header .back_btn {
    height: 100%;
    width: 20%;
    float: left;
    text-align: center;
}
header .back_btn svg {
    font-size: 80px;
    text-align: center;
    margin-top: 20px;
    color: #7b7b7b;
}
.search_bar {
    height: 100%;
    width: 80%;
    float: left;
    text-align: right;
}
.search_bar svg {
    font-size: 60px;
    text-align: center;
    color: #969696;
    padding: 30px;
}
.search_bar input {
    font-size: -webkit-xxx-large;
    height: 120px;
    float: left;
    background-color: #b7b7b7;
    border: none;
}
.search_bar input:focus {
    outline: -webkit-focus-ring-color auto 0px;
}
</style>
</head>
<body>
	<?php include'header.php';?>
<section class="search_seaction">
<form method="post">
	<header>
		<div class="back_btn">
			<a href="home.php"><i class="fas fa-arrow-left"></i></a>
		</div>
		<div class="search_bar">
		<input type="search" placeholder="Search" autofocus name="search">
			<button name="search_sbt"><i class="fas fa-search"></i></button>
		</div>
	</header>
</form>
<?php 
	if(isset($_POST['search_sbt'])){
		$search=$_POST['search'];
		$user_select="select * from usar where b13number='".$search."' || usar_name='".$search."'";
		$user_query=mysqli_query($db,$user_select);
		while($user_row=mysqli_fetch_assoc($user_query)){
		$user_name=$user_row['usar_name'];
		$user_balance=$user_row['balance'];
	}
?>
Name:<a style="color:red"><?php echo $user_name?></a>
Balance:<a style="color:red"><?php echo $user_balance?></a><br>
	<?php }?>
<?php 
	$max_select="select * from usar where balance=(select max(balance) from usar)";
	$max_query=mysqli_query($db,$max_select);
	while($max_row=mysqli_fetch_assoc($max_query)){
	$max_name=$max_row['usar_name'];
	$max_balance=$max_row['balance'];
?>
Name:<a><?php echo $max_name?></a>
Balance:<a><?php echo $max_balance?></a><br>
	<?php }?>
<?php 
	$low_select="select * from usar where balance<'".$max_balance."' order by balance DESC";
	$low_query=mysqli_query($db,$low_select);
	while($low_row=mysqli_fetch_assoc($low_query)){
	$low_name=$low_row['usar_name'];
	$low_balance=$low_row['balance'];
?>
Name:<a><?php echo $low_name?></a>
Balance:<a><?php echo $low_balance?></a><br>
	<?php }?>
</section>
</body>
</html>