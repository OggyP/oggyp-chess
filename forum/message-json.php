<?php
//Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
} else {
    $messages_amount = $_GET['amount'];
    /* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'chess');
    define('DB_PASSWORD', 'CHESS@sudocode69');
    define('DB_NAME', 'chess');

    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Prepare a select statement
//    $sql = "SELECT id, user, message, created_at FROM messages ORDER BY created_at DESC LIMIT 10";

    // Prepare a select statement
    $sql = "SELECT id, user, message, created_at FROM messages ORDER BY created_at DESC LIMIT " . $messages_amount;

    $result = $link->query($sql);

    $json_data=array();//create the array
    foreach($result as $rec)//foreach loop
    {
        $json_array['id']=$rec['id'];
        $json_array['user']=$rec['user'];
        $json_array['message']=$rec['message'];
        $json_array['created_at']=$rec['created_at'];
        //here pushing the values in to an array
        array_push($json_data,$json_array);

    }

    //built in PHP function to encode the data in to JSON format
    echo json_encode($json_data);
}
?>
