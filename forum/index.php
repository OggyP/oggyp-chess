<?php
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>OggyP Chess Chat</title>
        <style>
            body{ font: 14px sans-serif; text-align: center; }
        </style>
        <script src="/resources/js/messages.js"></script>
        <?php include '/var/www/oggyp.com/chess/resources/html/head.php'; ?>
        <link rel="stylesheet" href="/forum/resources/css/main.css">
    </head>
    <body>
        <?php include '/var/www/oggyp.com/chess/resources/html/navbar.php'; ?>
        <?php include '/var/www/oggyp.com/chess/resources/html/sidenav.php'; ?>
        <h1 class="my-5">Signed in as <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> on OggyP Chess Chat.</h1>
        <p>
            <a href="reset-password" class="link_button">Reset Your Password</a>
            <a href="logout" class="link_button">Sign Out of Your Account</a>
        </p>
        <div id="message_panel" class="scrollable">
            <p>Loading Messages</p>
        </div>
        <br>
        <h1><span id="test"></span></h1>
            <!-- Inputs-->
            <div class="social_input_fields">
                <!-- Text input field -->
                <input id="message_input">

                <!-- This button sendmessage js function -->
                <button id="message_button" onclick="sendMessage()">
                    Send Message
                </button>
                <input type="number" min="1" max="1000" value="10" id="messages-input-amount" oninput="saveLengthPreference()">
            </div>
        <br>
        <br>
        <script src="/resources/js/message_end.js"></script>
    </body>
</html>
