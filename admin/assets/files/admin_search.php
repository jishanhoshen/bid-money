<?php 
	include'config.php';
$id='';
$title='';
$sm_from='';
$sm_to='';
$date='';
$time='';
$from_name='';
$to_name='';
$amount='';
	if(isset($_POST['search_sbt'])){
		$s_number=$_POST['search_number'];
		//Date Convert Start
		if($date=$_POST['search_date']){
		$d_1=$date[0];
		$d_2=$date[1];
		$d_3=$date[2];
		$d_4=$date[3];
		$d_5=$date[4];
		$d_6=$date[5];
		$d_7=$date[6];
		$d_8=$date[7];
		$d_9=$date[8];
		$d_10=$date[9];
		$main_date=$d_9.$d_10.'/'.$d_6.$d_7.'/'.$d_1.$d_2.$d_3.$d_4;
		//Date Convert end
		}
	if(!empty($_POST['search_date'])){
			if(!empty($_POST['category'])){
				$title=$_POST['category'];
				$select="select * from massage where b13number='".$s_number."'&&title='".$title."'&&date='".$main_date."'";
				$query=mysqli_query($db,$select);
				while($row=mysqli_fetch_assoc($query)){
				echo $number=$row['b13number'];
				echo $name=$row['usar_name'];echo '<br>';
				}
			}
			else{
					$select="select * from massage where b13number='".$s_number."'&&date='".$main_date."'";
					$query=mysqli_query($db,$select);
					while($row=mysqli_fetch_assoc($query)){
					echo $number=$row['b13number'];
					echo $name=$row['usar_name'];echo '<br>';
				}
			}
	}
	else{
		if(empty($_POST['category'])){
			$select="select * from massage where b13number='".$s_number."'";
			$query=mysqli_query($db,$select);
			while($row=mysqli_fetch_assoc($query)){

			}
	  	}
		else{
			$title=$_POST['category'];
			$select="select * from massage where b13number='".$s_number."'&&title='".$title."'";
			$query=mysqli_query($db,$select);
			while($row=mysqli_fetch_assoc($query)){
				
			}
		}
	}
	if(!empty($_POST['category'])){
		if(empty($_POST['search_date'])&&empty($_POST['search_number'])){
			if($_POST['category']=='cashin'){
				$title='cashin';
			}
			elseif($_POST['category']=='cashout'){
				$title='cashout';
			}
			elseif($_POST['category']=='sendmoney'){
				$title='sendmoney';
			}
			elseif($_POST['category']=='receviedmoney'){
				$title='recivemoney';
			}
			elseif($_POST['category']=='b2bsend'){
				$title='B2B send';
			}
			elseif($_POST['category']=='b2brecevied'){
				$title='B2B Recevied';
			}
		$select="select * from massage where title='".$title."'";
		$query=mysqli_query($db,$select);
		while($row=mysqli_fetch_assoc($query)){
		echo $number=$row['b13number'];
		echo $name=$row['usar_name'];echo '<br>';
		}
	}
	}
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="../css/search.css">
</head>
<body>
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
	<form action="" method="post">
		<input type="number" placeholder="Mobile Number" name="search_number" />
		<input type="date" name="search_date"/><br>
		Cashin:<input type="radio" value="cashin" name="category"/><br>
		Cashout:<input type="radio" value="cashout" name="category"/><br>
		Send Money:<input type="radio" value="sendmoney" name="category"/><br>
		Recevied Money:<input type="radio" value="receviedmoney" name="category"/><br>
		B2B Send:<input type="radio" value="b2bsend" name="category"/><br>
		B2B Recevied:<input type="radio" value="b2brecevied" name="category"/><br>
		Win:<input type="radio" value="win" name="category"/><br><br>
		<input type="submit" value="Search" name="search_sbt"/>
	</form>
	<div class="main_container">
		<div class="header">header</div>
		<div class="contentarea">
			<div class="leftside">
				<ul>
					<form action="" method="post">
					<li><label for="number">Number </label>					<input type="number"name="search_number"	id="number"			placeholder="Mobile Number"  /></li>
					<li><label for="date">Date </label>						<input type="date"	name="search_date"		id="date"			/></li>
					<li><label for="cashin">Cash In </label>				<input type="radio"	name="category"			id="cashin"			value="cashin"/></li>
					<li><label for="cashout">Cash Out </label>				<input type="radio"	name="category"			id="cashout"		value="cashout" /></li>
					<li><label for="sendmoney">Send Money </label>			<input type="radio"	name="category"			id="sendmoney"		value="sendmoney" /></li>
					<li><label for="receviedmoney">Recevied Money</label>	<input type="radio"	name="category"			id="receviedmoney"	value="receviedmoney" /></li>
					<li><label for="b2bsend">B2B Send</label>				<input type="radio"	name="category"			id="b2bsend"		value="b2bsend" /></li>
					<li><label for="b2brecevied">B2B Recevied</label>		<input type="radio"	name="category"			id="b2brecevied"	value="b2brecevied" /></li>
					<li><label for="win">Win </label>						<input type="radio"	name="category"			id="win"			value="win"/></li>
					<li>													<input type="submit"name="search_sbt"/></li>
					</form>
				</ul>
			</div>
			<div class="middleside">
				<table border="1">
					<tr>
						<th>id</th>
						<th>title</th>
						<th>from</th>
						<th>name</th>
						<th>to</th>
						<th>name</th>
						<th>date</th>
						<th>time</th>
						<th>amount</th>
						<th></th>
						<th></th>
					</tr>
					<tr>
						<td><?php echo $id?></td>
						<td><?php echo $title?></td>
						<td><?php echo $sm_from?></td>
						<td><?php echo $from_name?></td>
						<td><?php echo $sm_to?></td>
						<td><?php echo $to_name?></td>
						<td><?php echo $date?></td>
						<td><?php echo $time?></td>
						<td><?php echo $amount?></td>
						<td><?php echo $id?></td>
					</tr>
				</table>
			</div>
			<div class="rightside">right</div>
		</div>
		<div class="footer">footer</div>
	</div>
</body>
</html>