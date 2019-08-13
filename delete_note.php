<?

//create connection
require "info.php";

$title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);

//create array for json responses
$feedback = array();

//validate
if (empty($title)) {
    $feedback['title'] = "Title may not be empty.";
} 


?>