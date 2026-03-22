<?php
$host = "localhost";
$user = "root";   // XAMPP default username
$pass = "";       // leave empty unless you set a MySQL password
$dbname = "svu_booking";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
