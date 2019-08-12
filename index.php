<?php
require "info.php";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

//sanitize
$author = filter_var($_GET['author'], FILTER_SANITIZE_STRING);
$title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
$text = filter_var($_POST['text'], FILTER_SANITIZE_STRING);

$errors = array();

//validate
if (empty($title)) {
    $errors['title'] = "Title may not be empty.";
} 

if (empty($text)) {
    $errors['text'] = "Text may not be empty.";
} 

//insert into the database if the previous conditions have been met and there's no errors.
if (count($errors) > 0) {
    echo "Sorry, there's an error: ";
    $json_errors = json_encode($errors);
    var_dump($json_errors);
    exit;
} else {
    $insert = "INSERT INTO note (author, text_entry, title) VALUES ('$author', '$text', '$title')";
    if (mysqli_query($conn, $insert)) {
        echo "Congratulations.";
    } else {
        echo "Not submitted.";
    }
}

?>