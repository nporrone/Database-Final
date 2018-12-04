<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CS3319 Assignment 3</title>
</head>
<body>

<?php
include 'connectdb.php';
include 'style.css';
?>

<h1>CS3319 Assignment 3</h1>

<h2>Customer Information:</h2>

<!-- Capture data and send it to the new page -->

<form action="question1.php" method="get">

<?php

   $query = "SELECT * FROM customer ORDER BY lastname";
   $result = mysqli_query($connection,$query);

   if (!$result) {
        die("databases query failed.");
   }

   while ($row = mysqli_fetch_assoc($result)) {

        echo "Customer Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
        echo "Customer ID: " . $row["customerID"] . "<br>";
        echo "City: " . $row["city"] . "<br>";
        echo "Phone: " . $row["phone"] . "<br>";
        echo "Agent ID: " . $row["agentID"] . "<br>" . "<br>";
	
   }
   mysqli_free_result($result);	
   $result = mysqli_query($connection,$query);
   echo "Detailed record of purchases: " . "<br>";
   echo "CustomerID: <select name = 'customerID'>";

   while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value = '".$row['customerID']."'>".$row['customerID']."</option>";
   }


   mysqli_free_result($result);
?>
</select>
<input type="submit" value="Go">
</form>

<h2>Product Information:</h2>

<button onclick="window.location.href='question2a.php'">Purchases Ascending by Description</button>
<button onclick="window.location.href='question2b.php'">Purchases Descending by Description </button>
<button onclick="window.location.href='question2c.php'">Purchases Ascending by Cost</button>
<button onclick="window.location.href='question2d.php'">Purchases Descending by Cost </button>

<h2>Insert a new purchase:</h2>

<form action="question3.php" method="get">

<?php

   $query = "SELECT * FROM customer";
   $result = mysqli_query($connection,$query);

   if (!$result) {
        die("databases query failed.");
   }

   echo "CustomerID: <select name = 'customerID'>";

   while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value = '".$row['customerID']."'>".$row['customerID']."</option>";
   }
 
   mysqli_free_result($result);

?>
</select>

<?php

   $query = "SELECT * FROM product";
   $result = mysqli_query($connection,$query);

   if (!$result) {
        die("databases query failed.");
   }

   echo "ProductID: <select name = 'productID'>";

   while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value = '".$row['productID']."'>".$row['productID']."</option>";
   }

   mysqli_free_result($result);

?>
</select>
Quantity Bought: 
<input type='number' name='quantityBS' min='1' max='9999' required>
<input type="submit" name="Insert Customer">
</form>

<h2>Insert a new customer:</h2>

<form action="question4.php" method="get">
First Name:
<input type="text" name="firstname" required>
Last Name:
<input type="text" name="lastname" required>
City :
<input type="text" name="city" required>
Phone Number(###-####) :
<input type="text" name="phone" pattern="[0-9]{3}-[0-9]{4}" required>

<?php

   $query = "SELECT * FROM customer";
   $result = mysqli_query($connection,$query);

   if (!$result) {
        die("databases query failed.");
   }

   echo "AgentID: <select name = 'agentID'>";

   while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value = '".$row['agentID']."'>".$row['agentID']."</option>";
   }

   mysqli_free_result($result);

?>
</select>

<input type="submit" value="Insert Customer">
</form>

<h2>Update a customer's phone number:</h2>

<form action="question5.php" method="get">

<?php

   $query = "SELECT * FROM customer";
   $result = mysqli_query($connection,$query);

   if (!$result) {
        die("databases query failed.");
   }

   echo "<select name = 'customerID'>";

   while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value = '".$row['customerID']."'>".$row['customerID']. " - ".$row['firstname']. " " .$row['lastname']. " - ".$row['phone'].  "</option>";
   }

   mysqli_free_result($result);

?>
</select>
Insert the new phone number(###-####):
<input type="text" name="phone" pattern="[0-9]{3}-[0-9]{4}" required>
<input type="submit" value="Update Phone Number" >
</form>

<h2>Delete a customer:</h2>

<form action="question6.php" method="get">

<?php

   $query = "SELECT * FROM customer";
   $result = mysqli_query($connection,$query);

   if (!$result) {
        die("databases query failed.");
   }

   echo "<select name = 'customerID'>";

   while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value = '".$row['customerID']."'>".$row['customerID']. " - ".$row['firstname']. " " .$row['lastname']. "</option>";
   }

   mysqli_free_result($result);

?>
</select>
<input type="submit" value="Delete Customer">
</form>

<h2>List all the customer names who bought more than a given quantity of any product:</h2>

<form action="question7.php" method="get">

Enter the Quantity: 
<input type='number' name='quantity' min='1' max='9999' required>
<input type='submit' name='Submit'>

</form>

<h2>List the description of any product that has never been purchased:</h2>

<button onclick="window.location.href='question8.php'">Products that have never been purchased</button>

<h2>Indepth Product Information:</h2>

<form action="question9.php" method="get">

<?php

   $query = "SELECT * FROM product";
   $result = mysqli_query($connection,$query);

   if (!$result) {
        die("databases query failed.");
   }

   echo "Indepth record of purchase for the product: " . "<br>";
   echo "ProductID: <select name = 'productID'>";

   while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value = '".$row['productID']."'>".$row['productID']. " -- " .$row['description']. "</option>";
   }

   mysqli_free_result($result);
?>
</select>
<input type="submit" value="Go">
</form>

</body>
</html>
