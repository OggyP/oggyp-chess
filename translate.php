
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
	<title>OggyP Chess Survey</title>
    <?php include '/var/www/oggyp.com/chess/resources/html/head.php'; ?>
</head>
<body>
<?php
include '/var/www/oggyp.com/chess/resources/html/navbar.php';
?>
<?php
// define variables and set to empty values
$stringtobinaryErr = $binarytostringerr= "";
$binarytostring = $stringtobinary = $binarytostringconv = $stringtobinaryconv ="";

function strigToBinary($string)
{
    $characters = str_split($string);

    $binary = [];
    foreach ($characters as $character) {
        $data = unpack('H*', $character);
        $binary[] = base_convert($data[1], 16, 2);
    }

    return implode(' ', $binary);
}

function binaryToString($binary)
{
    $binaries = explode(' ', $binary);

    $string = null;
    foreach ($binaries as $binary) {
        $string .= pack('H*', dechex(bindec($binary)));
    }

    return $string;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $stringtobinaryErr = "English is required";
    } else {
        $stringtobinary = test_input($_POST["name"]);
        $stringtobinaryconv = '110011010101010110100101010110101111101100000101101111110111110010101010101010110010100100001000100010100100001010001001001001000010010011000001010111111111111001001';
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$stringtobinary)) {
            $stringtobinaryErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["name1"])) {
        $binarytostringerr = "Binary is required";
    } else {
        $BinaryToString = test_input($_POST["stringtobin"]);
        $binarytostringconv = 'Ewan is awesome and Oscar sucks';
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
    <h1 class="survey_title">OggyPChess Feedback</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form_div">
            <h2 class="survey_items">English to Linux: <span class="error">* <?php echo $stringtobinaryErr;?></span></h2><br><input class="text_input" type="text" name="name" value="<?php echo $stringtobinary;?>">
            <br>
            <input class="submit" type="submit" name="submit" value="Submit">
        </div>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form_div">
            <h2 class="survey_items">Linux to English: <span class="error">* <?php echo $binarytostringerr;?></span></h2><br><input class="text_input" type="text" name="name1" value="<?php echo $binarytostring;?>">
            <br>
            <input class="submit" type="submit" name="submit" value="Submit">
        </div>
    </form>
    <h2>
    <?php echo 'To Linux: '; echo htmlspecialchars($stringtobinaryconv); ?>
    <?php echo 'To English: '; echo htmlspecialchars($binarytostringconv); ?>
    </h2>

</div>
</body>
</html>
