<?php
header('Access-Control-Allow-Origin: *');
//create connection
require "info.php";

//sanitize and declare variable fields
$title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);

$newtext = filter_var($_GET['newtext'], FILTER_SANITIZE_STRING);

//create array for json responses
$feedback = array();

//update database

    // below comment gets rid of all fields in table that are not filled in
    // "UPDATE note SET author = '".$new_author."', title = '".$new_title."', text_entry = '".$new_text."' WHERE author = '".$author."' OR title = '".$title."' OR text_entry = '".$text."'";
$update_text = "UPDATE note SET text_entry = '".$newtext."' WHERE title = '".$title."'";

//separate each query so it doesn't delete the rest of the table
if (mysqli_query($conn, $update_text)) {
} else {
    $feedback['fail'] = "The record has not been changed.";
}

// display errors resulted in JSON format.
echo json_encode($feedback);

//end connection
$conn = null;
?>