<?php
require "info.php";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$author = filter_var($_GET['author'], FILTER_SANITIZE_STRING);
$title = filter_var($_GET["title"], FILTER_SANITIZE_STRING);
$text = filter_var($_GET['text'], FILTER_SANITIZE_STRING);

$sql = "INSERT INTO note (author, title, text_entry) VALUES ('$author', '$title', '$text')";

?>