<?php 
	include 'assets/config/config.php';
	date_default_timezone_set('asia/dhaka');
	$date=date('d/m/Y');
	echo $present_time=date('H:i:s');echo '<br>';
		$unique_select="select * from product";
		$unique_query=mysqli_query($db,$unique_select);
		while($unique_row=mysqli_fetch_assoc($unique_query)){
		$table_name=$unique_row['table_name'];
		//start time convert area
		$product_time=$unique_row['end_time'];echo '<br/>';
		$end_time=$product_time;
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
		//end time convert area
		$end_date=$unique_row['end_date'];
			if($present_time>$end_time&&$date>=$end_date){
				$max_select="select * from $table_name where bid=(select max(bid) from $table_name)";
				$max_query=mysqli_query($db,$max_select);
				$max_row=mysqli_fetch_assoc($max_query);
				if($max_row){
					$max_number=$max_row['b13number'];
					$max_name=$max_row['usar_name'];
					$max_product_image=$max_row['product_image'];
					$max_product_name=$max_row['product_name'];
					$max_bid=$max_row['bid'];
					$product_select="select * from product where table_name='".$table_name."'";
					$product_query=mysqli_query($db,$product_select);
					$product_row=mysqli_fetch_assoc($product_query);
					$max_sale_price=$product_row['sale_price'];
					$select_match="select * from win_table where product_name='".$max_product_name."'";
					$query_match=mysqli_query($db,$select_match);
					$row_match=mysqli_fetch_assoc($query_match);
					$count_match=mysqli_num_rows($query_match);
					if($count_match<1){
						$insert="insert into win_table(b13number,usar_name,bid,product_image,product_name,sale_price)values('".$max_number."','".$max_name."','".$max_bid."','".$max_product_image."','".$max_product_name."','".$max_sale_price."')";
						$win_query=mysqli_query($db,$insert);
						$massage_insert="insert into massage(b13number,usar_name,bid,product_image,product_name,sale_price,status,color,title,time)values('".$max_number."','".$max_name."','".$max_bid."','".$max_product_image."','".$max_product_name."','".$max_sale_price."',1,'#a7a7a7','win','".$present_time."')";
						$massage_query=mysqli_query($db,$massage_insert);
					}
				}
			}		
		}
	header('location:assets/files/index.php');
?>
<h1><?php echo $end_time?></h1>