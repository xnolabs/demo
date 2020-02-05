<?php
session_start();
include("db.php"); 

$pagename="Your Login Results"; 					//Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 	//Call in stylesheet

echo "<title>".$pagename."</title>";			//display name of the page as window title

echo "<body>";

include ("headfile.html");					//include header layout file 

echo "<h4>".$pagename."</h4>";				//display name of the page on the web page

$email=$_POST['userEmail'];
$password=$_POST['userPassword'];

// a)	Check that NO email OR password FIELDS in the form should be left empty
if (!empty($email) || !empty($password))  {

// b)	RETRIEVE the RECORD from the USERS TABLE for which the email MATCHES the email entered in the form (if any)	
	$SQLgetUser = "select User from Users where userEmail=$email and userPassword=$password";

	//run SQL query for connected DB or exit and display error message
	$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());

	// Store all results in 2d array
	$arrayu = mysqli_fetch_array($exeSQL);

// c)	Compare the email retrieved from the from the Users table with the email entered in the form
	if ($arrayu['userEmail'] == $email) {
// d)	Compare the password retrieved from the from the Users table with the email entered in the form
		if ($arrayu['userPassword'] == $password) {
			echo "Login Successful!";
			$userid = $_SESSION['userId'];
			$usertype = $_SESSION['userType'];
			$userfname = $_SESSION['userFName'];
			$usersname = $_SESSION['userSName'];

			echo "Hello, ".$userfname." ".$usersname."";
			echo "<br>";
			echo "customer Type:".$arrayu['userType']."";
		}
		else {
			echo "Password not recognised, login again!";
		}
	}
	else {
		echo "Email not recognised, login again!";
		echo "<br>";
		echo "string";
	}







}
else {
	echo "<p> Both email and password fields need to be filled in!";
	echo "<p>Back to <a href=login.php> Login Page </a>";
}

include("footfile.html");					//include head layout

echo "</body>";
?>
