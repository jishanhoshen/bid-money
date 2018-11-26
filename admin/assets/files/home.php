<!---session start--->
<?php 
	include'../assets/config/config.php';
	session_start();
	if(isset($_SESSION['admin_number'])){}
	else{
		header('location:assets/files/login.php');
	}
?>
<!---session end--->
<?php 
		if(isset($_POST['sbt'])){
			$title_p=$_POST['title'];
			$rand=rand(00000000,99999999);
			$table_id=$_POST['table_id'];
			$table_name=$title_p.$rand;
			$Create_table = "CREATE TABLE `$table_name` (
				id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				bid INT(100) NOT NULL,
				usar_name VARCHAR(100) NOT NULL,
				b13number VARCHAR(100) NOT NULL,
				bid_action VARCHAR(100) NOT NULL,
				bider VARCHAR(100) NOT NULL,
				product_image VARCHAR(100) NOT NULL,
				confirm_bid VARCHAR(100) NOT NULL,
				product_name VARCHAR(100) NOT NULL
				)";
			$query=mysqli_query($db,$Create_table);
			$descriptiion_p=$_POST['descriptiion'];
			$purchase_price_p=$_POST['purchase_price'];
			$sale_price_p=$_POST['sale_price'];
			$image_p1=$_FILES['image1']['name'];
			$image_p2=$_FILES['image2']['name'];
			$tmp1=$_FILES['image1']['tmp_name'];
			$tmp2=$_FILES['image2']['tmp_name'];
			$start_date=$_POST['date'];
			$start_time=$_POST['start_time'];
				 $a=$start_time['0'];
				 $b=$start_time['1'];
				 $c=$start_time['2'];
				 $d=$start_time['3'];
			$join_time=$a.$b.':'.$c.$d;
			$main_time=$start_date.' '.$join_time.':00';
			$main_image1=move_uploaded_file($tmp1,'assets/upload_image/'.$image_p1);
			$end_time=$_POST['end_time'];
			$main_image2=move_uploaded_file($tmp2,'assets/upload_image/'.$image_p2);
			$bid_charge=$_POST['bid_charge'];
			$insert="insert into product(image1,image2,title,descriptiion,purchase_price,sale_price,table_name,start_time,bid_charge)values('".$image_p1."','".$image_p2."','".$title_p."','".$descriptiion_p."','".$purchase_price_p."','".$sale_price_p."','".$table_name."','".$main_time."','".$bid_charge."')";
			$query=mysqli_query($db,$insert);
			$table_query="update unique_tables set table_name='".$table_name."' where id='".$table_id."'";
			$query=mysqli_query($db,$table_query);
			if($query){
				header('refresh:0');
			}
		}
		if(isset($_POST['logout'])){
			session_unset();
			header('refresh:0');
		}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/header.css">
</head>
<body>
  <?php include 'header.php'; ?>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'menu1')" id="defaultOpen">Dashboard</button>
  <button class="tablinks" onclick="openCity(event, 'menu2')">BId Post</button>
  <button class="tablinks" onclick="openCity(event, 'menu3')">menu</button>
  <button class="tablinks" onclick="openCity(event, 'menu4')">menu</button>
  <button class="tablinks" onclick="openCity(event, 'menu5')">menu</button>
  <button class="tablinks" onclick="openCity(event, 'menu6')">menu</button>
  <button class="tablinks" onclick="openCity(event, 'menu7')">menu</button>
</div>
<div class="contentbox">
  <div id="menu1" class="tabcontent">
    <h3>this is a dashboard</h3>
	<form  id="form" action="" method="post">
		<input type="submit" value="Logout" name="logout"/>
	</form>
    <div class="chartboard">
      <table border="1">
        <tr>
          <th>No</th>
          <th>Image</th>
          <th>Title</th>
          <th>Purchase Price</th>
          <th>Sale Price</th>
          <th>Bid Charge</th>
          <th>Top Bid</th>
          <th>Users</th>
          <th>Loss</th>
          <th>Profite</th>
          <th>Top Bid Details</th>
          <th>Remove</th>
        </tr>
		<?php 
			$i=1;
			$select="select * from product order by id DESC";
			$query=mysqli_query($db,$select);
			while($row=mysqli_fetch_assoc($query)){
			$image=$row['image1'];
			$title=$row['title'];
			$descriptiion=$row['descriptiion'];
			$purchase_price=$row['purchase_price'];
			$sale_price=$row['sale_price'];
		?>
        <tr>
          <td><?php echo $i?></td>
          <td><img src="assets/upload_image/<?php echo $image?>" width="100" height="100"/></td>
          <td><?php echo $title?></td>
          <td><?php echo $purchase_price?></td>
          <td><?php echo $sale_price?></td>
          <td>20tk</td>
          <td>85tk</td>
          <td>20</td>
          <td>00tk</td>
          <td>5tk</td>
          <td><?php echo $descriptiion?></td>
          <td>remove</td>
        </tr>
			<?php $i++;}?>
      </table>
    </div>
  </div>

  <div id="menu2" class="tabcontent bidpost">
    <h3>Bid Post</h3>
<!---<form class="form-style-7" action="" method="post" enctype="multipart/form-data">
<ul>
<li>
    <label for="image">image</label>
    <input type="file" name="image1" />
    <span>Add Product Image</span>
</li>
<li>
    <label for="Title">Title</label>
    <input type="text" name="title" maxlength="100">
    <span>Product Title</span>
</li>

<li>
    <label for="price">Purchase Price</label>
    <input type="number" name="purchase_price" maxlength="100">
    <span>product price</span>
</li>
<li>
    <label for="price">Start Time</label>
    <input type="date" name="date" maxlength="100">
    <input type="text" name="start_time" maxlength="4">
    <span>Start Time</span>
</li>
<li>
    <label for="price">Bid Charge</label>
    <input type="number" name="bid_charge" maxlength="100">
    <span>Bid Charge</span>
</li>
<li>
    
</li>
</ul>
<ul>
<li>
    <label for="image">image</label>
    <input type="file" name="image2" />
    <span>Add Product Image</span>
</li>
<li>
    <label for="Title">Descriptiion</label>
    <input type="text" name="descriptiion" maxlength="100">
    <span>Descriptiion</span>
</li>

<li>
    <label for="price">Sale Price</label>
    <input type="number" name="sale_price" maxlength="100">
    <span>product price</span>
</li>
<li >
    <label for="price">End Time</label>
    <input type="text" name="end_time"  maxlength="5" />
    <span>End Time</span>
</li>
<li>
    <label for="price">Product Serial</label>
    <input type="number" name="table_id" maxlength="100">
    <span>Product Serial</span>
</li>
<li class="form_submit_style">
    <input type="submit" value="Post Now" name="sbt">
</li>
</ul>
</form>--->
<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
  </div>

  <div id="menu3" class="tabcontent">
    <h3>menu3</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab est minima libero architecto hic dicta? Porro, iure mollitia fugiat cumque nam, voluptate dolore, quis ipsum nihil eaque eveniet et! Vero ad ut, omnis, quibusdam maiores architecto, minima consequuntur quae adipisci perspiciatis doloremque voluptas dolore amet ratione a provident enim blanditiis!</p>
  </div>

  <div id="menu4" class="tabcontent">
    <h3>menu4</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab est minima libero architecto hic dicta? Porro, iure mollitia fugiat cumque nam, voluptate dolore, quis ipsum nihil eaque eveniet et! Vero ad ut, omnis, quibusdam maiores architecto, minima consequuntur quae adipisci perspiciatis doloremque voluptas dolore amet ratione a provident enim blanditiis!</p>
  </div>

  <div id="menu5" class="tabcontent">
    <h3>menu5</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab est minima libero architecto hic dicta? Porro, iure mollitia fugiat cumque nam, voluptate dolore, quis ipsum nihil eaque eveniet et! Vero ad ut, omnis, quibusdam maiores architecto, minima consequuntur quae adipisci perspiciatis doloremque voluptas dolore amet ratione a provident enim blanditiis!</p>
  </div>

  <div id="menu6" class="tabcontent">
    <h3>menu6</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab est minima libero architecto hic dicta? Porro, iure mollitia fugiat cumque nam, voluptate dolore, quis ipsum nihil eaque eveniet et! Vero ad ut, omnis, quibusdam maiores architecto, minima consequuntur quae adipisci perspiciatis doloremque voluptas dolore amet ratione a provident enim blanditiis!</p>
  </div>

  <div id="menu7" class="tabcontent">
    <h3>menu7</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab est minima libero architecto hic dicta? Porro, iure mollitia fugiat cumque nam, voluptate dolore, quis ipsum nihil eaque eveniet et! Vero ad ut, omnis, quibusdam maiores architecto, minima consequuntur quae adipisci perspiciatis doloremque voluptas dolore amet ratione a provident enim blanditiis!</p>
  </div>
</div>

<script type="text/javascript" src="assets/js/home.js"></script>     
<script type="text/javascript" src="assets/js/jquery.min.js"></script>     
</body>
</html>