<!DOCTYPE HTML>
<html lang="en">
    <head>
        <?php include '/var/www/oggyp.com/chess/resources/html/head.php'; ?>
        <title>OggyP Chess Search</title>
    </head>
    <body>
        <?php
        include '/var/www/oggyp.com/chess/resources/html/navbar.php';
        ?>

        <div class="content">
            <h1><?php
                $query = $_GET['query'];
                if ($query == '') {
                    echo 'Search Chess Openings';
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
                if($query!='') {
                    $servername = "localhost";
                    $username = "chess";
                    $password = "CHESS@sudocode69";
                    $dbname = "chess";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        echo("Connection failed: " . $conn->connect_error);
                    }

                    $stmt = $conn->prepare("SELECT ID, Code, Name, Variants FROM Openings
                    WHERE (`Code` LIKE CONCAT('%', ?, '%')) OR (`Name` LIKE CONCAT('%', ?, '%')) OR (`Variants` LIKE CONCAT('%', ?, '%'))");
                    $stmt->bind_param('sss', $query, $query, $query);

                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<p class='query_result'>";
                            echo "  <span class='query_result_content'>ECO Code: </span> " . $row["Code"] . "<br>";
                            echo "  <span class='query_result_content'>Name: </span> " . $row["Name"] . "<br>";
                            echo "  <span class='query_result_content'>Variants: </span>" . $row["Variants"];
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
