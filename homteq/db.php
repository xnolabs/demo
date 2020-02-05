<?php
$dbhost = 'phpmyadmin.ecs.westminster.ac.uk';
$dbuser = 'w1710551';
$dbpass = 'R8ovZ4DZEznJ';
$dbname = 'w1710551_0';

//create a DB connection 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//if the DB connection fails, display an error message and exit
if (!$conn)
{
  die('Could not connect: ' . mysqli_error($conn));
}
//select the database
mysqli_select_db($conn, $dbname);
?>