<div class="headeradmin">
	<?php 
		$select="select * from massage where b13number='abcdefghijklm'&&status='1'";
		$query=mysqli_query($db,$select);
		while($row=mysqli_fetch_assoc($query)){
		$count=mysqli_num_rows($query);}
	?>
		<a href="assets/files/adminnotification.php">Massage<?php echo $count?></a>
</div>