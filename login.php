<?php
	session_start();
	include "connect.php";

	//Check for username existance

	$sql="SELECT * FROM usernames WHERE username='$_POST[username]' AND password='$_POST[password]' LIMIT 1";
	$result=mysqli_query($conn,$sql);
	

	if(mysqli_num_rows($result)){
		echo "number of rows". mysqli_num_rows($result)."<br>";
		$myrow = mysqli_fetch_array($result);
		if($myrow["username"]=$_POST["username"] AND $myrow["password"]=$_POST["password"]){
			
			echo $myrow["username"]." ". $myrow["password"]. " name= ". $myrow["name"]. " ". $myrow["phonenumber"] ."<br>";
			$_SESSION["username"]=$myrow["username"];
			$_SESSION["name"]=$myrow["name"];
			$_SESSION["phonenumber"]=$myrow["phonenumber"];
			$_SESSION["password"]=$myrow["password"];
			$_SESSION["email"]=$myrow["email"];
			$_SESSION["surname"]=$myrow["surname"];
			


			echo $_SESSION["username"]. " ". $_SESSION["name"];
			echo "You have successfully logged in. <br><a href='index.php'> Go to Main Page </a>";
			header('location:index.php');
			exit();
		}
		else{
			$_SESSION["login"]=1;
			$_SESSION["signup"]=0;
			$_SESSION["alert"]=0;
			header('location:index.php');

		}
	}	
	else{
			$_SESSION["login"]=1;
			$_SESSION["signup"]=0;
			$_SESSION["alert"]=0;
			header('location:index.php');
	}
	mysqli_close($conn);
?>