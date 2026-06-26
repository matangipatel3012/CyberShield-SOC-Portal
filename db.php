<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soc_portal";

$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $dbname,
    3306
);

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>