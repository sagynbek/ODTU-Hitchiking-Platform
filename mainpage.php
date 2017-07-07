<?php
	session_start();
?>
<DOCTYPE html>
<html>
<head>
	<title>
		Group_Project
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper">
		<p style="background-color: grey; color: white;font-size: 25px">
			<?php
				if(!empty($_SESSION["username"])){
					echo "Welcome ".$_SESSION["name"];
					echo "  <a href='logout.php'> Log out</a>";
				}
				else{
					echo "You are not logged in.";
				}
			?>
		</p>
		<?php if(empty($_SESSION["username"])){
		?>
		<a href="adding.php" class="links">Sign up</a><br>
		<?php 
			}
			if(!empty($_SESSION["username"])){
		?>
		<a href="announceride.php" class="links">Announce ride</a><br>
		<a href="myrides.php" class="links">View my rides</a><br>
		<a href="changeinfo.php" class="links">Change my profile</a><br>
		
		<?php
			}
			echo "<br>";
			if((empty($_SESSION["username"]))){
		?>

				Login:
				<form action="login.php" method="POST">
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<input type="submit">
				</form>
		<?php
			}
		?>
		<br>
		Search for ride
		<form action="search.php" method="POST">
			<input type="text" name="startp" placeholder="Start Point">
			<input type="text" name="endp" placeholder="End Point">
			<input type="submit">
		</form>
		
	</div>
</body>
</html>