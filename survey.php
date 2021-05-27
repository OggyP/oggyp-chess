<!DOCTYPE HTML>
<html lang="en">
    <head>
	    <title>OggyP Chess Survey</title>
        <?php include '/var/www/oggyp.com/chess/resources/html/head.php'; ?>
    </head>
    <body>
        <?php include '/var/www/oggyp.com/chess/resources/html/navbar.php'; ?>
		<?php include '/var/www/oggyp.com/chess/resources/html/sidenav.php'; ?>
		
		<?php
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            # Define variables and set to empty values
            $nameErr = $emailErr = $websiteErr = $commentErr = "";
            $name = $email = $gender = $comment = $website = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                    # Check if name only contains letters and whitespace ur bad L
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                        $nameErr = "Only letters and white space allowed";
                    }
                }

                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    # Check if e-mail address is, indeed, an email
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }

                if (empty($_POST["website"])) {
                    $website = "";
                } else {
                    $website = test_input($_POST["website"]);
                    # Check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                        $websiteErr = "Invalid URL";
                    }
                }

                if (empty($_POST["comment"])) {
                    $commentErr = "Comment is required";
                } else {
                    $comment = test_input($_POST["comment"]);
                }

                if (empty($_POST["gender"])) {
                    $gender = "";
                } else {
                    $gender = test_input($_POST["gender"]);
                }
            }
        ?>
        
        <div class="content">
            <h1 class="survey_title">OggyPChess Feedback</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <!-- Name input -->
                <h2 class="survey_items">
                    Name: <span class="error">* <?php echo $nameErr;?></span>
                </h2>
                <br>
                <input class="text_input" type="text" name="name" value="<?php echo $name;?>">
                <br>
                
                
                <!-- Email input -->
                <h2 class="survey_items">
                    E-mail: <span class="error">* <?php echo $emailErr;?></span>
                </h2>
                <br>
                <input class="text_input" type="text" name="email" value="<?php echo $email;?>">
                <br>
                
                
                <!-- Website input -->
                <h2 class="survey_items">
                    Website URL for Feedback: <span class="error"><?php echo $websiteErr;?></span>
                </h2>
                <br>
                <input class="text_input" type="text" name="website" value="<?php echo $website;?>">
                <br>
                
                
                <!-- Comment input -->
                <h2 class="survey_items">
                    Comment: <span class="error">* <?php echo $commentErr;?></span>
                </h2>
                <br>
                <textarea class="text_input" name="comment" rows="10" cols="100"><?php echo $comment;?></textarea>
                <br>
                
                
                <!-- Gender input -->
                <h2 class="survey_items">Gender: </h2>
                <div class="input_select">
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                </div>
                <br>
                
                
                <!-- Submit -->
                <input class="submit" type="submit" name="submit" value="Submit">
            </form>
            
            <?php
                echo "<h2 class='survey_items'>Output:</h2>";
                $servername = "localhost";
                $username = "chess";
                $password = "CHESS@sudocode69";
                $dbname = "chess";

                # Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                # Check connection
                if (!$conn) {
                    echo "<p class='survey_out'>";
                    die("Connection failed: " . mysqli_connect_error());
                    echo "</p>";
                }
                
                # If all required fields are filled out
                if ($name != '' and $comment != '' and $email != '' and $emailErr == '' and $nameErr == '' and $websiteErr == '' and $commentErr == '') {
                    
                    // Find all entries that have a comment matching a certain php variable
                    $sql = $conn->prepare("SELECT * from Survey where Comment=?");
                    // Replace the ? above with the following string (in this case, the submitted comment)
                    $sql->bind_param('s', $comment);
                    // Do the search
                    $sql->execute();
                    // Get the result of the above query
                    $result = $sql->get_result();
                    
                    
                    # If there are no results (there are no matching comments)
                    if ($result->num_rows == 0) {
                        $sql = $conn->prepare("SELECT * from Survey where Email=?");
                        $sql->bind_param('s', $email);
                        $sql->execute();
                        
                        $result = $sql->get_result();
                        
                        # If there are less than 4 results (the email has only been used <4 times)
                        if ($result->num_rows < 4) {
                            
                            // Add a row to the table 'Survey'. Add values to the 'Email', 'Name',
                            // 'Website' and 'Comment' columns.
                            $sql = $conn->prepare("INSERT INTO Survey (Email, Name, Website, Comment)
                            VALUES (?, ?, ?, ?)");
                            // Replace the ? above with the respective strings
                            $sql->bind_param('ssss', $email, $name, $website, $comment);
                            
                            $sql->execute();
                            
                        } else {
                            # Notify the user of a duplicate email
                            echo "<p class='survey_out'>";
                            echo "Duplicate detected.";
                            echo "</p>";
                        }
                    } else {
                        # Notify the user of a duplicate comment
                        echo "<p class='survey_out'>";
                        echo "Duplicate detected.";
                        echo "</p>";
                    }
                } else {
                    # Asks the user to fill out the form
                    echo "<p class='survey_out'>";
                    echo "Please fill out the form.";
                    echo "</p>";
                }
                $conn->close();
            ?>
        </div>
    </body>
</html>
