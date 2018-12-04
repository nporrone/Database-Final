<?php

include 'connectdb.php';
include 'style.css';

$query = "SELECT product.description FROM product WHERE productID NOT IN(SELECT productID FROM purchase)";
$result = mysqli_query($connection,$query);

if (!$result) {
   die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($result)) {
   echo $row["description"];
   echo "<br>";
}


mysqli_free_result($result);


?>

