<?php
//create connection
require "info.php";

//sanitize and declare variable fields
$author = filter_var($_GET['author'], FILTER_SANITIZE_STRING);
$title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
$text = filter_var($_GET['text'], FILTER_SANITIZE_STRING);

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
    $list = "SELECT * FROM note ORDER BY title";
    if (mysqli_query($conn, $list)) {
        $feedback['success'] = $list/*"Your request has been accepted."*/;
    } else {
        $feedback['fail'] = "Your request has not been accepted.";
    }
}

// display errors resulted in JSON format.
$feedback_result_json = json_encode($feedback);
echo $feedback_result_json;
echo $feedback['success'];

//end connection
$conn = null;
?>