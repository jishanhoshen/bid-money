<?php 
	 include '../config/config.php';
	$number=$_SESSION['b13number'];
	if(isset($_SESSION['b13number'])){}
	else{
		header('location:login.php');
	}
?>

  <div class="swiper-container jishan-slide">
    <div class="swiper-wrapper">
		<?php 
			$select="select * from product";
			$query=mysqli_query($db,$select);
			while($row=mysqli_fetch_assoc($query)){
			$image=$row['image1'];
			$id=$row['id'];
			$table=$row['table_name'];
		?>
        <div class="swiper-slide productlist_img" onclick="window.location.href='product.php?id=<?php echo $id?>&&table=<?php echo $table?>'" style="background-image:url(../../admin/assets/upload_image/<?php echo $image?>)">
        </div>
			<?php }?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>

  <!-- Swiper JS -->
  <script src="../js/product_slide/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
	    loop:true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
	function show_big(){
	}
  </script>