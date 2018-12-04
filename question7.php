<?php

include 'connectdb.php';
include 'style.css';

$quantity = $_GET["quantity"];

$query = "SELECT product.description,purchase.quantityBS,customer.firstname,customer.lastname FROM customer JOIN purchase ON customer.customerID = purchase.customerID JOIN product ON product.productID = purchase.productID WHERE purchase.quantityBS > \"{$quantity}\" ";
$result = mysqli_query($connection,$query);

if (!$result) {
        die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($result)) {
        echo $row["firstname"] . " " . $row["lastname"] . " -- " .$row["description"] . " -- " .$row["quantityBS"];
        echo "<br>";
}


mysqli_free_result($result);

?>

