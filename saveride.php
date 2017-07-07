<?php
	include "connect.php";	
	session_start();
	$name=$_SESSION["name"];
	$phone=$_SESSION["phonenumber"];
	$username=$_SESSION["username"];
	if(!isset($_POST["dateofride"]) OR !isset($_POST["timeofride"]) OR !isset($_POST["startp"]) OR !isset($_POST["endp"]) OR !isset($_POST["capacity"]) OR !isset($name) OR !isset($phone)){
		die("Problem occured while announcing data");
	}
	//To make Upper case first alphabet 
	$_POST["startp"]=ucfirst(strtolower($_POST["startp"]));
	$_POST["endp"]=ucfirst(strtolower($_POST["endp"]));
	
$sql="INSERT INTO rides (dateofride,timeofride,startp,endp,capacity,name,phonenumber,username) VALUES('$_POST[dateofride]', '$_POST[timeofride]','$_POST[startp]','$_POST[endp]','$_POST[capacity]','$name','$phone','$username')";
if(!mysqli_query($conn, $sql)){
	die("ERROR:". $sql."<br>" . mysqli_error($conn));

}
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
                        
						<p class="title">New ride has been successfully added!</p>
						<?php
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