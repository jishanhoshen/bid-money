<div class="slidersection">
  <div class="swiper-container1">
    <div class="swiper-wrapper">
		<?php 
			$select="select * from product";
			$query=mysqli_query($db,$select);
			while($row=mysqli_fetch_assoc($query)){
			$image=$row['image1'];
			$id=$row['id'];
			$table=$row['table_name'];
		?>
        <div class="swiper-slide swiper-slide1" onclick="window.location.href='product.php?id=<?php echo $id?>&&table=<?php echo $table?>'" style="background-image:url(../../admin/assets/upload_image/<?php echo $image?>)">
        </div>
			<?php }?>
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="../js/product_slide/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container1', {
	    loop:true,
    });
	function show_big(){
	}
  </script>
</div>