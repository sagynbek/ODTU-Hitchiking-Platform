<?php 
    include "connect.php";
	session_start();
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
							
							
							$newpassword=$_POST["password"];
							$username=$_SESSION["username"];
							$newname=$_POST["name"];
							$newphonenumber=$_POST["phonenumber"];
							$newsurname=$_POST['surname'];
							$newmail=$_POST['email'];


							//echo $newpassword." ".$_POST["checkpassword"]." ".$_SESSION["password"]."<br>";
							//if($_SESSION["password"]!=$_POST["checkpassword"])
							if($_SESSION["password"]==$_POST["checkpassword"]){
								if($newpassword!=''){
									$update="UPDATE usernames SET password='$newpassword' WHERE username='$username' ";
									if(mysqli_query($conn,$update)){
										echo "password ";
									}
									else{
										echo "ERROR!".mysqli_error($conn);
									}
								}
								if($newname!=''){
									$update="UPDATE usernames SET name='$newname' WHERE username='$username' ";
									if(mysqli_query($conn,$update)){
										echo "name ";
									}
									else{
										echo "ERROR!".mysqli_error($conn);
									}
								}
								if($newphonenumber!=''){
									$update="UPDATE usernames SET phonenumber='$newphonenumber' WHERE username='$username' ";
									if(mysqli_query($conn,$update)){
										echo "phonenumber ";
									}
									else{
										echo "ERROR!".mysqli_error($conn);
									}
								}
								if($newsurname!=''){
									$update="UPDATE usernames SET surname='$newsurname' WHERE username='$username' ";
									if(mysqli_query($conn,$update)){
										echo "surname ";
									}
									else{
										echo "ERROR!".mysqli_error($conn);
									}
								}
								if($newmail!=''){
									$update="UPDATE usernames SET email='$newmail' WHERE username='$username'";
									if(mysqli_query($conn,$update)){
										echo "e-mail ";
									}
									else{
										echo "ERROR!".mysqli_error($conn);
									}
								}
								echo " have been successfully changed<br>";
								$sql="SELECT * FROM usernames WHERE username='$_SESSION[username]'";
	                        	$result=mysqli_query($conn,$sql);
	                        	if(mysqli_num_rows($result)){
									$myrow = mysqli_fetch_array($result);
									
									//echo $myrow["username"]." ". $myrow["password"]. " name= ". $myrow["name"]. " ". $myrow["phonenumber"] ."<br>";
									$_SESSION["username"]=$myrow["username"];
									$_SESSION["name"]=$myrow["name"];
									$_SESSION["phonenumber"]=$myrow["phonenumber"];
									$_SESSION["password"]=$myrow["password"];
									$_SESSION["email"]=$myrow["email"];
									$_SESSION["surname"]=$myrow["surname"];
									
								}

							}
							else{
								echo "You entered wrong password<br>
								<a href='changeinfo.php'>Go back</a>;
								";

							}

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
