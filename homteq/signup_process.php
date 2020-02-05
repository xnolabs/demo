<?php
session_start();
include("db.php"); 

$pagename="Your Sign Up Results"; 					//Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 	//Call in stylesheet

echo "<title>".$pagename."</title>";			//display name of the page as window title

echo "<body>";

include ("headfile.html");					//include header layout file 

echo "<h4>".$pagename."</h4>";				//display name of the page on the web page

$fname=$_POST['userFName'];
$sname=$_POST['userSName'];
$address=$_POST['userAddress'];
$postcode=$_POST['userPostCode'];
$telno=$_POST['userTelNo'];
$email=$_POST['userEmail'];
$password=$_POST['userPassword'];
$passvalid=$_POST['cPassword'];

if(!empty($fname) && (!empty($sname)) && (!empty($address)) && (!empty($postcode)) && (!empty($telno)) && (!empty($email)) && (!empty($password)) && (!empty($passvalid))) {
	if ($password !== $passvalid) {
		echo "your password does not match, please go back and try again!<br>";
		echo "<a href=signup.php>Go back</a>";
	}
	else {
		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
		if (preg_match($pattern, $email)) {
			$SQL = "insert into Users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) values ('c', '$fname', '$sname', '$address', '$postcode', '$telno', '$email', '$password')";

			if (mysqli_query($conn, $SQL)) {
			    echo "Registration Successful <br>";
			    echo "<a href=login.php>Login</a>";

			} else {
			    echo "Error: " . $SQL . "<br>" . mysqli_error($conn);
			    if (mysqli_error($conn) == 1062) {
			    	echo "This email is already in use <br>";
			    	echo "<a href=signup.php>Go back</a>";
			    }
			    if (mysqli_error($conn) == 1064) {
			    	echo "You have entered an invalid character <br>";
			    	echo "<a href=signup.php>Go back</a>";
			    }
			}
		}
		else {
			echo "email not in the right format <br>";
			echo "<a href=signup.php>Go back</a>";
		}
	}
}
else {
	echo "all mandatory fields need to be filled in <br>";
	echo "<a href=signup.php>Go back</a>";
}

include("footfile.html");					//include head layout

echo "</body>";
?>
