<?php

require "info.php";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//----------------------------------------------CREATE------------------------------------------

//sanitize and declare variable fields
$author = filter_var($_GET['author'], FILTER_SANITIZE_STRING);
$title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
$text = filter_var($_POST['text'], FILTER_SANITIZE_STRING);

//create array for json responses
$feedback = array();

//validate
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
        $feedback['success'] = "Your input has been accepted.";
    } else {
        $feedback['fail'] = "Your input has not been submitted.";
    }
}

// display errors resulted in JSON format.
$feedback_result_json = json_encode($feedback);
echo $feedback_result_json;

?>