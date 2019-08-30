<?php

header('Access-Control-Allow-Origin: *');
//create connection
require "info.php";

//sanitize and declare variable fields
$author = $_GET['author'];
$author = $conn->real_escape_string($author);
$title = $_GET['title'];
$title = $conn->real_escape_string($title);
$text = $_POST['text'];
$text = $conn->real_escape_string($text);

//create array for json responses
$feedback = array();

//validate
if (empty($author)) {
    $feedback['author'] = "Author may not be empty.";
} 

if (empty($title)) {
    $feedback['title'] = "Title may not be empty.";
} 

if (empty($text)) {
    $feedback['text'] = "Text may not be empty.";
} 

//insert into the database if the previous conditions have been met and there's no feedback.
if (count($feedback) > 0) {
    $feedback['errors'] = "There are errors.";
} else {
    $insert = "INSERT INTO note (author, text_entry, title) VALUES ('$author', '$text', '$title')";
    if (mysqli_query($conn, $insert)) {
    } else {
        $feedback['fail'] = "Your input has not been submitted.";
    }
}

// display errors resulted in JSON format.
echo json_encode($feedback);

//end connection
$conn = null;
?>