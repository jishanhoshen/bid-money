<?php 
	session_start();
	if(isset($_SESSION['b13number'])){
		header('location:trigger.php');
	}
	else{
		header('location:trigger.php');
	}
?>