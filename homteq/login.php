<?php
$pagename="Login"; 					//Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 	//Call in stylesheet

echo "<title>".$pagename."</title>";			//display name of the page as window title

echo "<body>";

include ("headfile.html");					//include header layout file 

echo "<h4>".$pagename."</h4>";				//display name of the page on the web page

echo "<form action=login_process.php method=post>";
echo "<label for=userEmail>Email Address: </label>";
echo "<input type=text name=userEmail>";
echo "<br>";
echo "<label for=userPassword>Password: </label>";
echo "<input type=password name=userPassword>";
echo "<br>";
echo "<input type=submit name=signup value='Login'>";
echo "</form>";

include("footfile.html");					//include head layout

echo "</body>";
?>
