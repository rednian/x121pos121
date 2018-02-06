<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sochic";
$message = "connected";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function product_retail($price = false, $markup = false, $vat = false) {
  $new_price = ($price + $vat) + $markup;
return number_format($new_price,2);
}
?>