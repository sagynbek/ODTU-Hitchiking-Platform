<?php 
    session_start();
    include "connect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hitchhiking</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1, maximum-scale=1">
</head>

<body>
    <div id="wrapper">
        <div id="headerDiv">
            <header id="mainHeader">
                <a href="http://www.metu.edu.tr/" title="Middle East Technical University" target="_blank"><img src="http://beki.space/ceit133/img/logo_metu.png" style="width:96px; float: left; margin-left: 4px; margin-top: 10px;"></a>
                <hgroup style="width: 500px; margin: auto;">
                    <h2>Middle East Technical University</h2>
                    <h1>Hitchhiking Platform</h1>
                </hgroup>
                <a href="http://hitchwiki.org/" title="The Hitchhiker's Guide to Hitchhiking the World" target="_blank"><img src="http://hitchwiki.org/hitchwiki_commons/assets/images/thumb.png" style="height:72px; float: right; margin-top: -80px; margin-right: 40px;"></a>
            </header>
        </div>
        <div id="topMenuDiv">
            <nav id="topNav">
                <ul>
                    <li><a href="index.php">Main Page</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="findride.php">Find a Ride</a></li>
                    <li><a href="announceride.php">Offer a Ride</a></li>
                    <li>
                        <form id="searchbox" method="post" action="search.php">
                            <input name="startp" type="text" id="search" placeholder="Type start point...">
                            <input type="hidden" name="endp">
                            <input id="submit" type="submit" value="">
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="contentDiv">
            
            <div id="leftMenuDiv">
                <?php
                        if(!empty($_SESSION["username"])){
                            echo "<h3>User</h3>";
                            echo "<span style='color:white;font-size:17px'>". $_SESSION["username"]."</span>"."<br>";
                            echo "<a href='myprofile.php'>My profile</a><br>";
                            echo "<a href='myrides.php'>My rides</a><br><br>";
                            echo "<a href='logout.php' style='color:white'><h3>Logout</h3></a>";
                        }
                        else{

                    ?>

                <a href="adding.php" class="signup"><h3>Sign Up</h3></a> <br> 
                
                <h3>Login</h3>
                <nav id="leftNav">
                    <ul style="display: none;">
                        <li style="margin-top:8px;"><a href="#">Menu item 1</a></li>
                        <li><a href="#">Menu item 2</a></li>
                        <li><a href="#">Menu item 3</a></li>
                    </ul>
                      
                    <form id="loginForm" method="POST" action="login.php" style="margin-top: 8px;">
                        Username:
                        <input type="text" id="userName" name="username"> Password:
                        <input type="password" id="passWord" name="password">
                        <input type="submit" value="Login" id="login">
                        <br>
                    </form>
                        <br><a href="#" title="Forgot your password?" style="font-size: 10px;">Forgot your password?</a>
                    <?php 
                        }
                    ?>

                </nav>
            </div>
            <div id="articleDiv">
                <article id="contentArticle">
                    <header id="contentHeader">
                        <h2>Welcome</h2>
                    </header>
                    <section id="contentSection">
                        <?php

							echo $_SESSION["username"]." ". $_SESSION['name']. " ". $_SESSION["password"]."<br>";
/*
                        	$sql="SELECT * FROM usernames WHERE username='$_SESSION[username]'";
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
								}
							}

                        	echo $_SESSION["username"]." ". $_SESSION['name']. " ". $_SESSION["password"]."<br>";

							*/

								echo " Write inforamtion into fields that you want to change only.<br>"."
									<form action='resultofchangeinfo.php' method='POST'>

										<input type='text' value='$_SESSION[username]' disabled><br>
										<input type='text' name='name' placeholder='Enter New Name'><br>
										<input type='text' name='surname' placeholder='Enter New Surname'><br>
										<input type='number' name='phonenumber' placeholder='Enter New Phonenumber'><br>
										<input type='email' name='email' placeholder='Enter New E-Mail'><br>
										<input type='password' name='password' placeholder='Enter New Password'> <br><br>
										<input type='password' name='checkpassword' placeholder='Enter your own password'>*<br>
										<input type='submit'>

									</form>

								";
								echo "<a href='mainpage.php' class='gohome'> Go to Homepage </a>";
								mysqli_close($conn);
							?>

                    </section>
                    <footer id="contentFooter">
                        <h6>team de la ceit</h6>
                    </footer>
                </article>
            </div>
            <div id="rightMenuDiv">
                <h3>Announcements</h3>
                <p style="margin-top:8px;">Here are some announcements about this platform or any other related topic. If you're not happy with these announcements, please pack your things and fuck off! Never visit this page again! Bastard!!!</p>
            </div>
        </div>
        <div id="footerDiv">
            <footer id="mainFooter">
                <h5>Footer &copy; 2016</h5>
            </footer>
        </div>
    </div>
</body>

</html>

