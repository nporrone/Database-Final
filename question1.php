<?php

include 'connectdb.php';
include 'style.css';


$customerID = $_GET["customerID"];

$query = "SELECT product.description,purchase.quantityBS FROM purchase JOIN customer ON customer.customerID = purchase.customerID JOIN product ON product.productID = purchase.productID WHERE customer.customerID = $customerID ORDER BY customer.lastname";
$result = mysqli_query($connection,$query);
if (!$result) {
	die("databases query failed.");
}


while ($row = mysqli_fetch_assoc($result)) {
	echo $row["description"] . " -- " . $row["quantityBS"];
	echo "<br>";
}	


mysqli_free_result($result);

?>
