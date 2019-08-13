<?

//create connection
require "info.php";

$title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);

//create array for json responses
$feedback = array();

//validate
if (empty($title)) {
    $feedback['title'] = "Please select a title.";
}

//delete from database if the previous conditions have been met and there's no feedback.
if (count($feedback) > 0) {
    $feedback['errors'] = "There are errors.";
} else {
    $delete = "DELETE FROM note WHERE title = $title";
    if (mysqli_query($conn, $delete)) {
        $feedback['success'] = "The record has been deleted.";
    } else {
        $feedback['fail'] = "The record has not been deleted.";
    }
}

// display errors resulted in JSON format.
echo json_encode($feedback);

//end connection
$conn = null;
?>