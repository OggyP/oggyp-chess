
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="/resources/css/legacy/survey.css"/>
    <meta charset="UTF-8">
    <title>OggyP Chess Insert Search Term</title>
    <head>
        <meta charset="utf-8">
        <title>Oggyp Chess</title>
        <?php include './resources/html/head.php'; ?>
    </head>
<body>
<?php
include './resources/html/navbar.php'
?>

<?php
// define variables and set to empty values
$titleErr = $textErr = $websiteErr = "";
$title = $text = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
    } else {
        $title = test_input($_POST["title"]);
    }

    if (empty($_POST["text"])) {
        $textErr = "Text is required";
    } else {
        $text = test_input($_POST["text"]);
    }

    if (empty($_POST["website"])) {
        $websiteErr = "Website is required";
    } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL) - thank you stack overflow
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "Invalid URL";
        }
    }
    if (empty($_POST["password"])) {
        $passwd = "";
    } else {
        $passwd = test_input($_POST["password"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="content">
<h1 class="survey_title">OggyP Chess Search Maker</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form_div">
        <h2>Title: <span class="error">* <?php echo $titleErr;?></span></h2><br><input class="text_input" type="text" name="title" value="<?php echo $title;?>">
        <br>
        <h2>Text: <span class="error">* <?php echo $textErr;?></span></h2><br><input class="text_input" type="text" name="text" value="<?php echo $text;?>">
        <br>
        <h2>Website URL: <span class="error">* <?php echo $websiteErr;?></span></h2><br><input class="text_input" type="text" name="website" value="<?php echo $website;?>">
        <br>
        <h1>Enter Password: <span class="error"></span></h1><br><input class="text_input" type="password" name="password" value="<?php echo $passwd;?>">
        <br>
        <br>
        <input class="submit" type="submit" name="submit" value="Submit">
    </div>
</form>

    <?php
	echo "<h2>Output:</h1>";
	if ($passwd == "GoykovicIsTheBest") {
        $servername = "localhost";
        $username = "chess";
        $password = "CHESS@sudocode69";
        $dbname = "chess";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            echo "<p class='survey_out'>";
            die("Connection failed: " . mysqli_connect_error());
            echo "</p>";
        }
        if ($title != '' and $titleErr == '' and $text != '' and $textErr == '' and $website != '' and $websiteErr == '') {

            $sql = $conn->prepare("INSERT INTO search (title, text, url)
        VALUES (?, ?, ?)");
            $sql->bind_param('sss', $title, $text, $website); // 's' specifies the variable type => 'string'
            $sql->execute();

        } else {
            echo "<p class='survey_out'>";
            echo "Please fill out the form.";
            echo "</p>";
        }

        $conn->close();
    } else {
        echo "<p class='survey_out'>";
        echo "Password is incorrect";
        echo "</p>";
    }
    ?>
</div>
</body>
</html>
