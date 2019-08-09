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
$title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
$text = filter_var($_GET['text'], FILTER_SANITIZE_STRING);

$insert = "INSERT INTO note (author, text_entry) VALUES ('$author', '$text')";
$require_title = "INSERT INTO note (title) VALUES IF NOT EXISTS ('$title')";

if(mysqli_query($conn, $sql, $require_title)) {
    echo 'Your query has been submitted.';
} else {
    echo 'Not submitted.';
}

?>