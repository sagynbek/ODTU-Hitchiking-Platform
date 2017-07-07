<?php
	session_start();
	session_unset();
	echo "You have Logged Out. <br><a href='mainpage.php'> Go to Main Page </a>";
	header('location:index.php');
			exit();
?>