<?php

include 'connectdb.php';
include 'style.css';

$customerID = $_GET["customerID"];
$phone = $_GET["phone"];

$query = "SELECT * FROM customer WHERE customerID = \"{$customerID}\" ";
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_assoc($result);


$query = "UPDATE customer SET phone = \"{$phone}\"  WHERE customerID = \"{$customerID}\" ";
echo "Phone Number has been Updated";


mysqli_query($connection,$query);
mysqli_free_result($result);

?>


