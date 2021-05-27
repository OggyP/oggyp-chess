<!DOCTYPE HTML>
<html lang="en">
    <head>
	    <title>OggyP Chess Survey Results</title>
        <?php include './resources/html/head.php'; ?>
    </head>
    <body>
        <?php
            include './resources/html/navbar.php';
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            if (empty($_POST["website"])) {
                $passwd = "";
            } else {
                $passwd = test_input($_POST["website"]);
            }
            if (empty($_POST["delete_id"])) {
                $delete_id = "";
            } else {
                $delete_id = test_input($_POST["delete_id"]);
            }
        ?>

        <div class="content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1>Enter Password: <span class="error"></span></h1>
                <br>
                <input class="text_input" type="password" name="website" value="<?php echo $passwd;?>">
                <input class="submit" type="submit" name="submit" value="Submit">
            </form>
            
            <?php
                $servername = "localhost";
                $username = "chess";
                $password = "CHESS@sudocode69";
                $dbname = "chess";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    echo ("Connection failed: " . $conn->connect_error);
                }

                if ($passwd == 'GoykovicIsTheBest') {
                    $sql = "SELECT SurveyID, Email, Name, Website, Comment FROM Survey";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<p class='query_result'>";
                            echo "  <span class='query_result_content'>ID: </span>" . $row["SurveyID"] . "<br>";
                            echo "  <span class='query_result_content'>Name:</span> " . $row["Name"] . "<br>";
                            echo "  <span class='query_result_content'>Email: </span>" . $row["Email"] . "<br>";
                            echo "  <span class='query_result_content'>Website: </span>" . $row["Website"] . "<br>";
                            echo "  <span class='query_result_content'>Comment: </span>" . $row["Comment"] . "<br>";
                            echo "</p> <hr>";
                        }
                    } else {
                        echo "0 results";
                    }

                    echo "<form method='post' action='"; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo "'>";
                    echo "  <h1>Delete: </h1><br>";
                    echo "  <input class='text_input' type='text' placeholder='Enter ID' name='delete_id' value='"; echo $delete_id; echo "'>";
                    echo "  <input class='submit' type='submit' name='submit' value='Submit'>";
                    echo "</form>";

                }

                if ($delete_id != '') {
                    $sql = $conn->prepare("DELETE FROM Survey WHERE SurveyID=?");
                    $sql->bind_param('i', $delete_id);
                    $sql->execute();
                }

                $conn->close();
            ?>
        </div>
    </body>
</html>
