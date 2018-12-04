<?php

include 'connectdb.php';
include 'style.css';


$submit = $_GET["submit"];

$query = "SELECT * FROM product ORDER BY cost DESC";
$result = mysqli_query($connection,$query);
if (!$result) {
        die("databases query failed.");
}


while ($row = mysqli_fetch_assoc($result)) {

echo "Product Description: " . $row["description"] . "<br>";
echo "Product ID: " . $row["productID"] . "<br>";
echo "Cost: " . $row["cost"] . "<br>";
echo "Quantity on hand: " . $row["quantity"] . "<br>" . "<br>";

}

mysqli_free_result($result);

?>

