<?php
//session_save_path("../temp");
	session_start();	

	unset($_SESSION['id']);
	unset($_SESSION['type']);
	
// 	session_destroy();
	header("location: ../index.html");
?>