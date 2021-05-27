<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>OggyP Chess Search</title>
        <?php include '/var/www/oggyp.com/chess/resources/html/head.php'; ?>
    </head>
    <body>
        <?php
            include '/var/www/oggyp.com/chess/resources/html/navbar.php';
            
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
        ?>
        
        <div class="content">
            <h1>
                <?php
                    $query = $_GET['query'];  // Sets the variable 'query' to the submitted value
                    if ($query == '') {
                        echo 'Search';
                    } else {
                        echo "Search Results for '";
                        echo $query;
                        echo "'";
                    }
                ?>
            </h1>
            
            <form class="search" action="search" method="GET">
                <input id="query_input" type="text" name="query">
                <input id="query_submit" type="submit" value="Search">
            </form>
            
            <?php
                # If all required fields have been filled out
                if($query!='') {
                    $servername = "localhost";
                    $username = "chess";
                    $password = "CHESS@sudocode69";
                    $dbname = "chess";

                    # Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    # Check connection
                    if ($conn->connect_error) {
                        echo("Connection failed: " . $conn->connect_error);
                    }
                    
                    
                    // Search every column from the 'search' table for any row that contains the query
                    $sql = $conn->prepare("SELECT id, title, text, url FROM search
                    WHERE (`title` LIKE CONCAT('%', ?, '%')) OR (`text` LIKE CONCAT('%', ?, '%'))");
                    // Replace ? above with the respective strings
                    $sql->bind_param('ss', $query, $query);
                    // Do the search
                    $sql->execute();
                    // Get the results of the search
                    $result = $sql->get_result();
                    
                    
                    # If there are any results
                    if ($result->num_rows > 0) {
                        # Get each set of results and format
                        while ($row = $result->fetch_assoc()) {
                            echo "<p class='query_result'>";
                            echo "  <a href='" . $row["url"] . "'>";
                            echo "    <span class='query_result_content'>Title: </span> " . $row["title"] . "<br>";
                            echo "    <span class='query_result_content'>Description: </span>" . $row["text"] . "<br>";
                            echo "    <span class='query_result_content'>Website: </span>" . $row["url"] . "<br>";
                            echo "  </a>";
                            echo "</p> <hr>";
                        }
                    } else {
                        echo "<p class='query_result'>";
                        echo "0 results";
                        echo "</p> <hr>";
                    }
                    $conn->close();
                }
            ?>
        </div>
    </body>
</html>
