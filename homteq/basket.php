<?php
session_start();
include("db.php");

$pagename="Smart Basket"; 					//Create and populate a variable called $pagename
$newprodid=$_POST['h_prodid'];
$reququantity=$_POST['p_quantity'];

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 	//Call in stylesheet

echo "<title>".$pagename."</title>";			//display name of the page as window title

echo "<body>";

include ("headfile.html");					//include header layout file 

echo "<h4>".$pagename."</h4>";				//display name of the page on the web page

if (isset($_POST['h_delprodid'])) {
	$delprodid = $_POST['h_delprodid'];
	unset($_SESSION['basket'][$delprodid]);
	echo "1 item removed from the basket <br>";
}

if (isset($newprodid)) {
	
	//echo "<p>ID of selected product: ".$newprodid;
	//echo "<p>Quantity of selected product: ".$reququantity;

	//create a new cell in the  basket session array. Index this cell with the new product id.
	//Inside the cell store the required product quantity 
	$_SESSION['basket'][$newprodid]=$reququantity;
	
	echo "<p>1 item added to the basket";
	echo "<br>";

}
else {
	echo "<p>Current basket unchanged";
	echo "<br>";
}

echo "<table>";
echo "<tr>";
echo "<th> Product Name </th>";
echo "<th> Price </th>";
echo "<th> Quantity </th>";
echo "<th> Subtotal </th>";
echo "</tr>";

if (isset($_SESSION['basket'])) {
	foreach($_SESSION['basket'] as $index => $value) {
		//create a $SQL variable and populate it with a SQL statement that retrieves product details
		$SQL="select prodId, prodName, prodPrice, prodQuantity from Product where prodId=".$index."";
		//run SQL query for connected DB or exit and display error message
		$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

		while ($arrayp=mysqli_fetch_array($exeSQL))	 {
			echo "<tr>";
			echo "<td>".$arrayp['prodName']."</td>";
			echo "<td>&pound".number_format($arrayp['prodPrice'],2,".",",")."</td>";
			echo "<td style='text-align: center'>".$value."</td>";

			$subtotal = $arrayp['prodPrice'] * $value;

			echo "<td style='text-align: center'>&pound".number_format($subtotal,2,".",",")."</td>";	
			echo "<td>";
			echo "<form action=basket.php method=post>";
			echo "<input type=submit value='remove'>";
			echo "<input type=hidden name=h_delprodid value=".$index.">";	
			echo "</form>";		
			echo "</tr>";

			$total += $subtotal;
		}
	}
	echo "<tr>";
	echo "<td colspan=3 style='text-align: right; font-weight: bold'>Total</td>";
	echo "<td style='font-weight: bold; text-align: center'>&pound".number_format($total,2,".",",")."</td>";
	echo "</table>";

}
else {
	echo "Basket is empty";
	echo "<br>";
	$total = 0.00;
	echo "<tr>";
	echo "<td colspan=3 style='text-align: right; font-weight: bold'>Total</td>";
	echo "<td style='font-weight: bold; text-align: center'>&pound".number_format($total,2,".",",")."</td>";
	echo "</table>";
}

echo "<br>";

echo "<br>";
echo "<a href=clearbasket.php>Clear Basket";
echo "</a>";
echo "<br>";
echo "<p>New Homteq Users: <a href=signup.php>Sign Up";
echo "</a>";
echo "<p>Existing Homteq Users: <a href=login.php>Login";
echo "</a>";
include("footfile.html");					//include footer layout

echo "</body>";
?>
