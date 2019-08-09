<?php
require "info.php";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

echo $_GET['author'];
echo $_GET["title"];
echo $_GET['text'];
echo $_GET['date'];


?>