<?php 
	$menu_select="select * from usar where b13number='".$number."'";
	$menu_query=mysqli_query($db,$menu_select);
	$menu_row=mysqli_fetch_assoc($menu_query);
	$user_name=$menu_row['usar_name'];
	$user_image=$menu_row['image'];
	//hyphen section start
	$select1="SELECT left(b13number,3) FROM usar where b13number='".$number."'";
	$query1=mysqli_query($db,$select1);
	$row1=mysqli_fetch_assoc($query1);
	$hyphen_1=$row1['left(b13number,3)'];
	$select2="SELECT left(b13number,5) FROM usar where b13number='".$number."'";
	$query2=mysqli_query($db,$select2);
	$row2=mysqli_fetch_assoc($query2);
	$hyphen_2=$row2['left(b13number,5)'];
	$sub2=substr($hyphen_2,3);
	$select3="SELECT left(b13number,8) FROM usar where b13number='".$number."'";
	$query3=mysqli_query($db,$select3);
	$row3=mysqli_fetch_assoc($query3);
	$hyphen_3=$row3['left(b13number,8)'];
	$sub3=substr($hyphen_3,5);
	$select4="SELECT left(b13number,11) FROM usar where b13number='".$number."'";
	$query4=mysqli_query($db,$select4);
	$row4=mysqli_fetch_assoc($query4);
	$hyphen_4=$row4['left(b13number,11)'];
	$sub4=substr($hyphen_4,8);
	$main=$hyphen_1.'-'.$sub2.'-'.$sub3.'-'.$sub4;
	//hyphen section end
	if(isset($_POST['logout'])){
		unset($_SESSION['b13number']);
		header('refresh:0');
	}
?>
<div class="menubar-section" id="menubar-id">
	<div class="menubar-top">
		<div class="com-logo">
		</div>
		<div class="menu-profile">
			<div class="user-profle">
				<img src="jjj/upload/<?php echo $user_image?>" alt="" />
			</div>
			<div class="user-name">
				<h6><?php echo $user_name?></h6>
			</div>
		<div class="menu-userid">
			<p>ID : <?php echo $main?></p>
		</div>
		</div>
	<hr>
	</div>

	<div class="menubar-bottom">
		<ul>
			<li><a href="cashout.php"><i class="fas fa-hand-holding-usd"></i>Cash Out</a></li>
			<li><a href="sendmoney.php"><i class="fab fa-telegram-plane"></i>Send Money</a></li>
			<li><a href="agentpoint.php"><i class="fas fa-map-marker-alt"></i>Agent Point</a></li>
			<li><a href="agentpoint.php"><i class="fas fa-map-marker-alt"></i>Bill Pay</a></li>
			<li><a href="editprofile/editprofile.php"><i class="fas fa-map-marker-alt"></i>Edit Profile</a></li>
			<li><a href="about.php"><i class="fas fa-user-tie"></i>About</a></li>
			<form action="" method="post">
			<li class="logout"><a href=""><i class="fas fa-sign-out-alt"></i><button name="logout">Logout</button></a></li>
			</form>
			<li class="contact">
				<div class="contact_left"><i class="fas fa-user-tie"></i></div>
				<div class="contact_right"><div class="bold">Contact Us</div><div>+01856-252550</div></div>
			</li>
		</ul>
	</div>
	<script src="../js/menubar.js" type="text/javascript"></script>
</div>
<div class="menuback" id="menubar-back-id" onclick="menuslideoff()"></div>
