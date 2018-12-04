<?php

include 'connectdb.php';
include 'style.css';

$firstname = $_GET["firstname"];
$lastname = $_GET["lastname"];
$city = $_GET["city"];
$phone = $_GET["phone"];
$agentID = $_GET["agentID"];

$query1= 'SELECT max(customerID) AS maxid FROM customer';
$result=mysqli_query($connection,$query1);
if (!$result) {
  die("database max query failed.");
}
$row=mysqli_fetch_assoc($result);
$newkey = intval($row["maxid"]) + 1;
$customerID = (string)$newkey;

$row = mysqli_fetch_assoc($result);

if (!$row) {

    $query = "INSERT INTO customer (customerID,firstname, lastname, city, phone, agentID) VALUES ( \"{$customerID}\",\"{$firstname}\",\"{$lastname}\", \"{$city}\", \"{$phone}\", \"{$agentID}\")";
    echo "Customer has been inserted";

}

mysqli_query($connection,$query);
mysqli_free_result($result);

?>

