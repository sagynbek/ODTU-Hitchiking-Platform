<?php
	include "connect.php";
	session_start();
/*
	//Check for username existance

	//This is the directory where images will be saved
	$target = "pics/";
	$target = $target . basename( $_FILES['Filename']['name']);

	//This gets all the other information from the form
	$Filename=basename( $_FILES['Filename']['name']);


	//Writes the Filename to the server
	if(move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {
	    //Tells you if its all ok
	    echo "The file ". basename( $_FILES['Filename']['name']). " has been uploaded, and your information has been added to the directory";
	    // Connects to your Database
/*	    mysql_connect("localhost", "root", "") or die(mysql_error()) ;
	    mysql_select_db("altabotanikk") or die(mysql_error()) ;

	    //Writes the information to the database
	    mysql_query("INSERT INTO usernames (image)
	    VALUES ('$Filename')") ;
	} else {
	    //Gives and error if its not
	    echo "Sorry, there was a problem uploading your file.";
	}
*/
	$sql="SELECT username FROM usernames WHERE username='$_POST[username]'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)){
		die("There is someone with this username, please try different one"."<br><a href='adding.php'> Go back</a>" );
	}	

$sql="INSERT INTO usernames (name, surname, phonenumber, email,username,password, gender) VALUES('$_POST[name]', '$_POST[surname]','$_POST[phonenumber]','$_POST[email]','$_POST[username]','$_POST[password]','$_POST[gender]')";
if(!mysqli_query($conn, $sql)){
	die("ERROR:". $sql."<br>" . mysqli_error($conn));

}
?>
		<?php 

			$sql="SELECT id FROM usernames WHERE username='$_POST[username]'";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)){
				while($row=mysqli_fetch_assoc($result)){
					$timely=$row["id"];
				}/*
				echo $timely. " <br>";

				echo "<br>";
				echo $_POST["name"];
				echo "<br>";

				echo $_POST["surname"];
				echo "<br>";
				echo $_POST["username"];
				echo "<br>";
				echo $_POST["password"];
				echo "<br>";
				echo $_POST["gender"];
				echo "<br>";
				echo $_POST["phonenumber"];*/

				$_SESSION["username"]=$_POST["username"];
				$_SESSION["name"]=$_POST["name"];
				$_SESSION["phonenumber"]=$_POST["phonenumber"];
				$_SESSION["password"]=$_POST["password"];
				$_SESSION["email"]=$_POST["email"];
				$_SESSION["surname"]=$_POST["surname"];

				echo "<a href='index.php' class='gohome'> Go to Homepage </a>";
			}
			else{
				echo "0 results";
				echo "<a href='index.php' class='gohome'> Go to Homepage </a>";
			}
			

			mysqli_close($conn);
			$_SESSION["signup"]=1;
			$_SESSION["alert"]=0;
			
			header('location:index.php');
		?>