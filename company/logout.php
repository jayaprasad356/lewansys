<?php
//session_save_path("../temp");
	session_start();	

	unset($_SESSION['company_id']);
	unset($_SESSION['company_type']);
	
// 	session_destroy();
	header("location: ../index.html");
?>