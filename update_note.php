<?php

//create connection
require "info.php";

//sanitize and declare variable fields
$author = filter_var($_GET['author'], FILTER_SANITIZE_STRING);
$title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
$text = filter_var($_POST['text'], FILTER_SANITIZE_STRING);

$new_author = filter_var($_GET['new_author'], FILTER_SANITIZE_STRING);
$new_title = filter_var($_GET['new_title'], FILTER_SANITIZE_STRING);
$new_text = filter_var($_POST['new_text'], FILTER_SANITIZE_STRING);

//create array for json responses
$feedback = array();

//update database if the previous conditions have been met and there's no feedback.
$update = "UPDATE note SET author = '".$new_author."', title = '".$new_title."', text_entry = '".$new_text."' WHERE author = '".$author."' OR title = '".$title."' OR text_entry = '".$text."'";
if (mysqli_query($conn, $delete)) {
    $feedback['success'] = "The record has been deleted.";
} else {
    $feedback['fail'] = "The record has not been deleted.";
}

// display errors resulted in JSON format.
echo json_encode($feedback);

//end connection
$conn = null;
?>