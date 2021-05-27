<?php
//Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}

$messageContent = $_POST['content'];
$username = $_SESSION["username"];

if(strlen($messageContent) < 250) {

    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'chess');
    define('DB_PASSWORD', 'CHESS@sudocode69');
    define('DB_NAME', 'chess');

    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Prepare an insert statement
// Add a row to the table 'Survey'. Add values to the 'Email', 'Name',
// 'Website' and 'Comment' columns.
    $sql = $link->prepare("INSERT INTO messages (user, message)
                            VALUES (?, ?)");
// Replace the ? above with the respective strings
    $sql->bind_param('ss', $username, $messageContent);

    $sql->execute();
}
?>
