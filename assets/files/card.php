<?php 
	//Hyphen section start
	$card_select="select * from usar where b13number='".$number."'";
	$card_query=mysqli_query($db,$card_select);
	$card_row=mysqli_fetch_assoc($card_query);
	$card_image=$card_row['image'];
	$card_name=$card_row['usar_name'];
	$card_balance=$card_row['balance'];
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
	$card_number=$hyphen_1.'-'.$sub2.'-'.$sub3.'-'.$sub4;
	//Hyphen section end
	//Dotted section start
	$poisa='.00';
	$main_balance=$card_balance;
	$count=strlen($main_balance);
	if($count==1){
		$catch_dot=$main_balance['0'];
		$main_balance=$catch_dot.$poisa;
	}if($count==2){
		$catch_dot=$main_balance['0'];
		$decriment=substr($main_balance,1);
		$main_balance=$catch_dot.$decriment.$poisa;
	}if($count==3){
		$catch_dot=$main_balance['0'];
		$decriment=substr($main_balance,1);
		$main_balance=$catch_dot.$decriment.$poisa;
	}if($count==4){
		$catch_dot=$main_balance['0'];
		$decriment=substr($main_balance,1);
		$main_balance=$catch_dot.','.$decriment.$poisa;
	}elseif($count==5){
		$catch_dot1=$main_balance['0'];
		$catch_dot2=$main_balance['1'];
		$ctach=$catch_dot1.$catch_dot2;
		$decriment=substr($main_balance,2);
		$main_balance=$ctach.','.$decriment.$poisa;
	}elseif($count==6){
		$catch_dot1=$main_balance['0'];
		$catch_dot2=$main_balance['1'];
		$catch_dot3=$main_balance['2'];
		$decriment=substr($main_balance,3);
		$main_balance=$catch_dot1.','.$catch_dot2.$catch_dot3.','.$decriment.$poisa;
	}elseif($count==7){
		$catch_dot1=$main_balance['0'];
		$catch_dot2=$main_balance['1'];
		$catch_dot3=$main_balance['2'];
		$catch_dot4=$main_balance['3'];
		$decriment=substr($main_balance,4);
		$main_balance=$catch_dot1.$catch_dot2.','.$catch_dot3.$catch_dot4.','.$decriment.$poisa;
	}elseif($count==8){
		$catch_dot1=$main_balance['0'];
	 	$catch_dot2=$main_balance['1'];
		$catch_dot3=$main_balance['2'];
		$catch_dot4=$main_balance['3'];
		$catch_dot5=$main_balance['4'];
		$decriment=substr($main_balance,5);
		$main_balance=$catch_dot1.','.$catch_dot2.$catch_dot3.','.$catch_dot4.$catch_dot5.','.$decriment.$poisa;
	}
	//Dotted section end
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<link href='https://fonts.googleapis.com/css?family=Share+Tech+Mono' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Signika:400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/card.css" />
<div class="card-holder">
  <div class="card" id="master_card">
    <span class="title">Bank of&nbsp; B13</span>
    <span class="bank-logo"></span>
    <img class="chip" src="jjj/upload/<?php echo $card_image?>">
    <img class="mc" src="../imgs/mastercard.png">
    <span class="holo-back"></span>
    <span class="holo"></span>
    <br>
	<span class="emboss name"><?php echo $card_name?></span><br>
    <span class="emboss number"><?php echo $card_number?></span>
	<table>
		<tr>
			<th class="small-type">Balance</th><th class="small-type">bonus plus</th>
		</tr>
		<tr>
			<td class="emboss exp"><?php echo $main_balance?></td><td class="emboss exp">50.00</td>
		</tr>
	</table>    
  </div>
</div>
</body>
</html>