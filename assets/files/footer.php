<script>
	function master_card_click1(){
		document.getElementById('master_card').style.bottom='140px';
		document.getElementById('mastercard1').style.display='none';
		document.getElementById('mastercard2').style.padding='0px';
	}
	function master_card_click2(){
		document.getElementById('master_card').style.bottom='-600px';
		document.getElementById('mastercard1').style.display='block';
	}
</script>
<div class="footer-section">
	<?php include'card.php';?>
	<div class="balance-btn" onclick="master_card_click1()" id="mastercard1">BALANCE<i class="fas fa-coins"></i></div>
	<div class="balance-btn" onclick="master_card_click2()" id="mastercard2">BALANCE<i class="fas fa-coins"></i></div>
</div>

