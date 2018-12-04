<?php

include 'connectdb.php';
include 'style.css';

$customerID = $_GET["customerID"];

$query = "DELETE FROM customer WHERE customerID = \"{$customerID}\" ";

echo "Customer has been deleted";

mysqli_query($connection,$query);

?>

