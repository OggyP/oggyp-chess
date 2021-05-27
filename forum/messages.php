<?php
//Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
} elseif ($_SESSION['username'] == 'OggyzFake') {
     session_destroy();
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
    $sql = '(SELECT id, user, message, created_at FROM messages ORDER BY created_at DESC LIMIT ' . $messages_amount . ') ORDER BY created_at';

    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $yesterdays_date = date('Y-m-d', strtotime("-1 days"));
            $current_date = date("Y-m-d");
            
            $db_date = date_create($row["created_at"]);
            $date_to_check = date_format($db_date, "Y-m-d");

            if ($date_to_check == $current_date) {
                $display_date = date_format($db_date, "g:i:s a") . " Today";
            } elseif ($date_to_check == $yesterdays_date) {
                $display_date = date_format($db_date, "g:i:s a") . " Yesterday";
            } else {
                $display_date = date_format($db_date, "g:i:s a \o\\n D\, jS F Y");
            }

            echo "<p>";
            echo "<span class=username";
            if ($row["user"] == "OggyP") {
                echo ' style="color:blue"';
            } elseif ($row["user"] == "Mitchell") {
                echo ' style="color:ForestGreen"';
            } elseif ($row["user"] == "dungcatcher") {
                echo ' style="color:pink"';
            } elseif ($row["user"] == "God") {
                echo ' style="color:red"';
            } elseif ($row["user"] == "Jamcode") {
                echo ' style="color:mediumaquamarine"';
            }
            echo ">" . htmlspecialchars($row["user"]) . " " . "</span>";
            echo "<span class=message>" . htmlspecialchars($row["message"]) . "</span>";
            echo "<span class=time_stamp>" . htmlspecialchars($display_date) . "</span>";
            echo "</p> <hr>";
        }
    } else {
        echo "0 results";
    }
}
?>
<div id="bottom_messages_panel"></div>
