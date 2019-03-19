<?php

	session_start();

	if(!isset($_SESSION['TIENDA'])){

		header("location:../Index.php");
		
	}

?>