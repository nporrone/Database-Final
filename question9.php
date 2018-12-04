<?php

include 'connectdb.php';
include 'style.css';


$productID= $_GET["productID"];

$query = "SELECT product.description , SUM(purchase.quantityBS) AS totalsold, SUM(purchase.quantityBS * product.cost) AS totalprofit FROM product,purchase WHERE purchase.productID = \"{$productID}\" ORDER BY purchase.productID";
$result = mysqli_query($connection,$query);

if (!$result) {
   die("databases query failed.");
}

$row = mysqli_fetch_assoc($result);

echo "Product Description: " . $row["description"] . "<br>";
echo "Total Quantity Sold: " . $row["totalsold"] . "<br>";
echo "Total profit: " .$row["totalprofit"] . "<br>";

mysqli_free_result($result);



?>

