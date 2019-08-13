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

//validate
if (empty($title)) {
    $feedback['title'] = "Title may not be empty.";
} 

//update database if the previous conditions have been met and there's no feedback.
if (count($feedback) > 0) {
    $feedback['errors'] = "There are errors.";
} else {
    // below comment gets rid of all fields in table that are not filled in
    // "UPDATE note SET author = '".$new_author."', title = '".$new_title."', text_entry = '".$new_text."' WHERE author = '".$author."' OR title = '".$title."' OR text_entry = '".$text."'";
    $update_author = "UPDATE note SET author = '".$new_author."' WHERE author = '".$author."'";
    $update_title = "UPDATE note SET title = '".$new_title."' WHERE title = '".$title."'";
    $update_text = "UPDATE note SET text_entry = '".$new_text."' WHERE text_entry = '".$text."'";
    //separate each query so it doesn't delete the rest of the table
    if (mysqli_query($conn, $update_author)) {
        $feedback['success'] = "The record has been changed.";
    } else {
        $feedback['fail'] = "The record has not been changed.";
    }
    if (mysqli_query($conn, $update_title)) {
        $feedback['success'] = "The record has been changed.";
    } else {
        $feedback['fail'] = "The record has not been changed.";
    }
    if (mysqli_query($conn, $update_text)) {
        $feedback['success'] = "The record has been changed.";
    } else {
        $feedback['fail'] = "The record has not been changed.";
    }
}

// display errors resulted in JSON format.
echo json_encode($feedback);

//end connection
$conn = null;
?>