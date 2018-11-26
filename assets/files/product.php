<?php
	include 'header.php';
	include'../config/config.php';
	if(isset($_SESSION['b13number'])){}
	else{
		header('location:login.php');
	}
	//current time start
	date_default_timezone_set('asia/dhaka');
	$present_date=date('d/m/Y');
	$present_time=date('h:i:s');
	//current time end
	$b13number=$_SESSION['b13number'];
	$id=$_GET['id'];
	$table=$_GET['table'];
	
	/*start store Usar Detail*/
	$usar_select="select * from usar where b13number='".$b13number."'";
	$usar_query=mysqli_query($db,$usar_select);
	$usar_row=mysqli_fetch_assoc($usar_query);
	$usar_id=$usar_row['id'];
	$usar_name=$usar_row['usar_name'];
	$usar_number=$usar_row['b13number'];
	$usar_balance=$usar_row['balance'];
	/*end store Usar Detail*/
	/*Start Store Product Detail*/
	$select="select * from product where id='".$id."'";
	$query=mysqli_query($db,$select);
	$row=mysqli_fetch_assoc($query);
	$pro_image=$row['image1'];
	$pro_title=$row['title'];
	$pro_purchase_price=$row['purchase_price'];
	$pro_descriptiion=$row['descriptiion'];
	$pro_bid_charge=$row['bid_charge'];
	$pro_start_time=$row['start_time'];
	$pro_end_time=$row['end_time'];
	$pro_start_date=$row['start_date'];
	$pro_end_date=$row['end_date'];
	/*End Store Product Detail*/
	//Convert Time And Date Area Start
		$start_time=$row['start_time'];
		$start_date=$row['start_date'];
		$product_time=$row['end_time'];
		$product_date=$row['end_date'];
		$end_time=$product_time;
		$end_month=$product_date;
		$end_day1=$product_date['0'];
		$end_day2=$product_date['1'];
		$end_day_main=$end_day1.$end_day2;
		$end_year_1=$product_date['6'];
		$end_year_2=$product_date['7'];
		$end_year_3=$product_date['8'];
		$end_year_4=$product_date['9'];
		$end_year_main=$end_year_1.$end_year_2.$end_year_3.$end_year_4;
		if($product_time['0']=='0'&&$product_time['1']=='1'&&$product_time['8']=='p'){
			$convert_hour='13';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
			
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='2'&&$product_time['8']=='p'){
			$convert_hour='14';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='3'&&$product_time['8']=='p'){
			$convert_hour='15';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='4'&&$product_time['8']=='p'){
			$convert_hour='16';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='5'&&$product_time['8']=='p'){
			$convert_hour='17';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='6'&&$product_time['8']=='p'){
			$convert_hour='18';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='7'&&$product_time['8']=='p'){
			$convert_hour='19';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='8'&&$product_time['8']=='p'){
			$convert_hour='20';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='9'&&$product_time['8']=='p'){
			$convert_hour='21';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='1'&&$product_time['1']=='0'&&$product_time['8']=='p'){
			$convert_hour='22';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='1'&&$product_time['1']=='1'&&$product_time['8']=='p'){
			$convert_hour='23';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='1'&&$product_time['1']=='2'&&$product_time['8']=='a'){
			$convert_hour='00';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='1'&&$product_time['8']=='a'){
			$convert_hour='01';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='2'&&$product_time['8']=='a'){
			$convert_hour='02';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='3'&&$product_time['8']=='a'){
			$convert_hour='03';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='4'&&$product_time['8']=='a'){
			$convert_hour='04';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='5'&&$product_time['8']=='a'){
			$convert_hour='05';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='6'&&$product_time['8']=='a'){
			$convert_hour='06';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='7'&&$product_time['8']=='a'){
			$convert_hour='07';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='8'&&$product_time['8']=='a'){
			$convert_hour='08';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='0'&&$product_time['1']=='9'&&$product_time['8']=='a'){
			$convert_hour='09';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='1'&&$product_time['1']=='0'&&$product_time['8']=='a'){
			$convert_hour='10';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='1'&&$product_time['1']=='1'&&$product_time['8']=='a'){
			$convert_hour='11';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		elseif($product_time['0']=='1'&&$product_time['1']=='2'&&$product_time['8']=='p'){
			$convert_hour='12';
			$convert_minute_1=$product_time['3'];
			$convert_minute_2=$product_time['4'];
			$join_minute=$convert_minute_1.$convert_minute_2;
			$end_time=$convert_hour.':'.$join_minute.':00';
		}
		
		if($product_date['3']==0&&$product_date['4']==1){
			$end_month='jan';
		}
		elseif($product_date['3']==0&&$product_date['4']==2){
			$end_month='feb';
		}
		elseif($product_date['3']==0&&$product_date['4']==3){
			$end_month='mar';
		}
		elseif($product_date['3']==0&&$product_date['4']==4){
			$end_month='apr';
		}
		elseif($product_date['3']==0&&$product_date['4']==5){
			$end_month='may';
		}
		elseif($product_date['3']==0&&$product_date['4']==6){
			$end_month='jun';
		}
		elseif($product_date['3']==0&&$product_date['4']==7){
			$end_month='jul';
		}
		elseif($product_date['3']==0&&$product_date['4']==8){
			$end_month='aug';
		}
		elseif($product_date['3']==0&&$product_date['4']==9){
			$end_month='sep';
		}
		elseif($product_date['3']==1&&$product_date['4']==0){
			$end_month='oct';
		}
		elseif($product_date['3']==1&&$product_date['4']==1){
			$end_month='nov';
		}
		elseif($product_date['3']==1&&$product_date['4']==2){
			$end_month='dec';
		}
	//Convert Time And Date Area End
	/*start all row class*/
	$bider='bider_off';
	$product_box='productbox_on';
	$bidbtn='bidbtn_on';
	$confbidbtn='confbidbtn_off';
	$editbtn_section='editbtn-section-off';
	/*end all row class*/
	/*start bid now button function*/
	if(isset($_POST['bid_now'])){
		if($present_time>$start_time&&$present_date>=$start_date){
			$balance_select="select * from usar where b13number='".$b13number."'";
			$balance_query=mysqli_query($db,$balance_select);
			$balance_row=mysqli_fetch_assoc($balance_query);
			$usar_balance=$balance_row['balance'];
			$pro_bid_charge=$row['bid_charge'];
			$decriment=$usar_balance-$pro_bid_charge;
				if($usar_balance<$pro_bid_charge){
				echo '<script>alert("balance running low")</script>';
			}
		else{
			$insert="insert into $table(id,usar_name,b13number,product_image,product_name)values('".$usar_id."','".$usar_name."','".$usar_number."','".$pro_image."','".$table."')";
			$ins_query=mysqli_query($db,$insert);
			$btn_1_update="update $table set bider=1,bid_action=1,bid=0 where b13number='".$b13number."'";
			$btn_1_query=mysqli_query($db,$btn_1_update);
			$balance_update="update usar set balance='".$decriment."' where b13number='".$b13number."'";
			$balance_update_query=mysqli_query($db,$balance_update);
		}
		/*insert php query for development*/
		/*insert php query for development*/
		/*insert php query for development*/
		}
		else{
			echo '<script>alert("The Bid Start In '.$start_date.'  '.$start_time.'")</script>';
		}
	}
	if(isset($_POST['confirm_bid_first'])){
		$first_bid=intval($_POST['first_bid']);
		if($usar_balance<$first_bid){
			echo '<script type="text/javascript">alert("Balance Running Low")</script>';
		}
		else{
		$confirm_bid_update="update $table set bid='".$first_bid."',confirm_bid=1 where b13number='".$b13number."'";
		$confirm_bid_query=mysqli_query($db,$confirm_bid_update);
		}
	}
	if(isset($_POST['confirm_bid_second'])){
		$second_bid=intval($_POST['second_bid']);
		if($usar_balance<$second_bid){
			echo '<script type="text/javascript">alert("Balance Running Low")</script>';
		}
		else{
		$confirm_bid_update="update $table set bid='".$second_bid."' where b13number='".$b13number."'";
		$confirm_bid_query=mysqli_query($db,$confirm_bid_update);
		}
	}
		$select="select * from $table where b13number='".$b13number."'";
		$query=mysqli_query($db,$select);
		$row=mysqli_fetch_assoc($query);
		$bid_number=$row['bider'];
		$bid_m=$row['bid'];
		if($bid_number==1){
			$bider='bider_on';
			$product_box='productbox_off';
			$bidbtn='bidbtn_off';
			$confbidbtn='confbidbtn_on';
		}
		else{
			$bider='bider_off';
			$product_box='productbox_on';
			$bidbtn='bidbtn_on';
			$confbidbtn='confbidbtn_off';
		}
		/*end bid now button function*/
		/*start confirm_bid button function*/
		$select="select * from $table where b13number='".$b13number."'";
		$query=mysqli_query($db,$select);
		$row=mysqli_fetch_assoc($query);
		$confirm_bid=$row['confirm_bid'];
		if($confirm_bid==1){
			$confbidbtn='confbidbtn_off';
			
			$editbtn_section='editbtn-section-on';
		}
		else{
			
		}
		/*end confirm_bid button function*/
		/*start logout section*/
		if(isset($_POST['logout'])){
		session_unset();
		header('refresh:0');
		}
		/*end logout section*/
?>
<html>
<head>
<title>Product</title>
<link rel="stylesheet" href="../css/product.css"/>
</head>
<body>
    <div class="header"></div>
    <div class="time-section">
    	<div class="times">
    		<h6>Start</h6>
			<p><?php echo $pro_start_date?></p>
    		<p><?php echo $pro_start_time?></p>
    	</div>
    	<div class="times">
    		<h3 font-size="2em" id="countdown"></h3>
			<?php 
	if($present_time>$start_time&&$present_date>=$start_date){
		echo '<script>
		function one(){
		document.getElementById("conform_edit").style.display="block";
		document.getElementById("editbtn").style.display="none";
	}

var countDownDate = new Date("'.$end_month.$end_day_main.','.$end_year_main.' '.$end_time.'").getTime();


var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  
  document.getElementById("countdown").innerHTML = days + "day " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "Bid Time Over";
  }
}, 1000);
</script>';
	}
	echo '<script>
			document.getElementById("countdown").innerHTML = "Please Wait...";
	</script>';
	
?>
    	</div>
    	<div class="times">
    		<h6>End</h6>
			<p><?php echo $pro_end_date?></p>
    		<p><?php echo $pro_end_time?></p>
    	</div>
    </div>
	<form action="" method="post">
    <div class="content-section">
	    <div class="<?php echo $product_box?>" id="bidchange">
		    <div class="photo-section">
		    	<img src="../../admin/assets/upload_image/<?php echo $pro_image?>" alt="">
		    </div>
		    <div class="descrip-section">
				<h2><?php echo $pro_title?></h2>
				<span><p>Price :<?php echo $pro_purchase_price?> tk </p></span>
				<p><?php echo $pro_descriptiion?>.</p>
		    </div>
		    <div class="btn-section">
		    	<div class="<?php echo $bidbtn?>" >
		    	<p>Bid Charge:<?php echo $pro_bid_charge?> tk</p>
					<input type="submit" value="Bid Now" name="bid_now" class="bid_now"/>
				</div>
				<div class="<?php echo $confbidbtn?>">
					<p>Lorem ipsum dolor sit amet, </p>
					<input type="text" class="bidinput" name="first_bid">
					<input type="submit" value="Conform Bid" name="confirm_bid_first" class="conform_Bid"/>
				</div>
				<div class="<?php echo $editbtn_section ?>">
					<div class="editbtn" id="editbtn">
						<div class="echobid"><?php echo $bid_m ; ?></div>
						<a class="edit_btn" onclick="one()"/>Edit Bid</a>
					</div>
					<div class="conformupdate" id="conform_edit">
						<input type="text" class="inputbidupdate" name="second_bid" value="<?php echo $bid_m ; ?>">
						<input type="submit" value="Conform edit" name="confirm_bid_second" class="conform_edit"/>
					</div>
				</div>
		    </div>
		</div>
	    <div class="<?php echo $bider?>" id="bider">
			<?php 
				$max_select="select * from $table where bid=(select max(bid) from $table)";
				$max_query=mysqli_query($db,$max_select);
				$max_row=mysqli_fetch_assoc($max_query);
				$max_value=$max_row['bid'];
				$max_name=$max_row['usar_name'];
				
			?>
	    	<div class="single-bider">
				<p>Name:<?php echo $max_name?></p>
				<div class="user_bid"><span>৳</span><?php echo $max_value?></div>
			</div>
			<?php 
				$dec_max="select * from $table where bid<'".$max_value."' order by bid DESC limit 20";
				$dec_max_query=mysqli_query($db,$dec_max);
				while($dec_max_row=mysqli_fetch_assoc($dec_max_query)){
				$max_value=$dec_max_row['bid'];
				$max_name=$dec_max_row['usar_name'];
			?>
	    	<div class="single-bider">
				<p>Name:<?php echo $max_name?></p>
				<div class="user_bid"><span>৳</span><?php echo $max_value?></div>
			</div>
				<?php }?>
	    </div>
	</div>
	</form>
    <div class="foot-section"></div>
    <div class="footer"></div>
<?php include 'footer.php';?>
</body>
</html>