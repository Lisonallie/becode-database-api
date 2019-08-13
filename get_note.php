<?php
//create connection
require "info.php";

//create array for json responses
$feedback = array();

//list the titles
$get_row = "SELECT '".$title."' FROM note";

//establish query parameters
$query = mysqli_query($conn, $get_row);

//create json-changeable variable request of all rows in the table
$display_rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

//display the resulting query fetch in json format
echo json_encode($display_rows);

//create conditions for cases of success and fail connection and query requests
if ($query) {
    $feedback['confirm'] = "Your query has been successfully displayed.";
} else {
    $feedback['deny'] = "Your query could not be displayed:" . $conn -> error;
}

// display errors resulted in JSON format.
echo json_encode($feedback);

//end connection
$conn = null;
?>