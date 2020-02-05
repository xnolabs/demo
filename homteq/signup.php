<?php
session_start();

$pagename="Sign Up"; 					//Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 	//Call in stylesheet

echo "<title>".$pagename."</title>";			//display name of the page as window title

echo "<body>";

include ("headfile.html");					//include header layout file 

echo "<h4>".$pagename."</h4>";				//display name of the page on the web page

echo "<form action=signup_process.php method=post>";
echo "<label for=userSName>*First Name: </label>";
echo "<input type=text name=userFName>";
echo "<br>";
echo "<label for=userSName>*last Name: </label>"; 
echo "<input type=text name=userSName>";
echo "<br>";
echo "<label for=userAddress>*Address: </label>";
echo "<input type=text name=userAddress>";
echo "<br>";
echo "<label for=userPostCode>*Post Code:</label>"; 
echo "<input type=text name=userPostCode>";
echo "<br>";
echo "<label for=userTelNo>*Tel No: </label>";
echo "<input type=text name=userTelNo>";
echo "<br>";
echo "<label for=userEmail>*Email Address: </label>";
echo "<input type=text name=userEmail>";
echo "<br>";
echo "<label for=userPassword>*Password: </label>";
echo "<input type=password name=userPassword>";
echo "<br>";
echo "<label for=cpassword>*Confirm Password: </label>";
echo "<input type=password name=cPassword>";
echo "<br>";
echo "<input type=submit name=signup value='Sign Up'>";
echo "<input type=submit name=clear value='Clear Form'>";
echo "</form>";

include("footfile.html");					//include head layout

echo "</body>";
?>
