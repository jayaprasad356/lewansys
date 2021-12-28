<?php
//session_save_path("../temp");
	session_start();	

	unset($_SESSION['college_institution_id']);
	unset($_SESSION['college_institution_type']);
	
// 	session_destroy();
	header("location: ../index.html");
?>