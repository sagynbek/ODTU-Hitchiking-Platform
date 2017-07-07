<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="groupproject";
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	if(!$conn){
		die("Connection to server has failed") . mysqli_connect_error();
	}
?>