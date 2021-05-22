<?php
//Checks for the cookie 'mode' and sets $mode as that value
$cookie_name = 'mode';
$cookie = $mode = '';
if(!isset($_COOKIE[$cookie_name])) {
    $mode = 'dark';
} else {
    $cookie = $_COOKIE[$cookie_name];
    if ($cookie == 'light') {
        $mode = 'light';
    } elseif ($cookie == 'ugly') {
            $mode = 'ugly';
    } else {
        $mode = 'dark';
    }
}

//used to change the css based on the current mode
//Will return which ever the value set for that mode
// echo <?php echo modechange($mode,'What ever for light','dark', 'ugly');?\>
function modechange($current_cookie, $light, $dark, $ugly) {
    if ($current_cookie == 'dark') {
        return $dark;
    } elseif ($current_cookie == 'light') {
        return $light;
    } elseif ($current_cookie == 'ugly') {
        return $ugly;
    } else {
        return $dark;
    }
}
?>