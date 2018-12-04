<?php

include 'connectdb.php';
include 'style.css';

$customerID = $_GET["customerID"];
$productID = $_GET["productID"];
$quantityBS = $_GET["quantityBS"];

$query = "SELECT * FROM purchase WHERE customerID = \"{$customerID}\" AND productID = \"{$productID}\"";
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_assoc($result);

if (!$row) {

    $query = "INSERT INTO purchase (productID, customerID, quantityBS) VALUES (\"{$productID}\",\"{$customerID}\",{$quantityBS})";
    echo "Purchase has been inserted";

} else {

    $query = "UPDATE purchase SET quantityBS = quantityBS + \"{$quantityBS}\"  WHERE customerID = \"{$customerID}\"  AND productID = \"{$productID}\" ";
    echo "Purchase has been updated";

}

mysqli_query($connection,$query);
mysqli_free_result($result);

?>

