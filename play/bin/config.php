<?php
////////////////////////////////////////////////////////////////////////
//Configuration file for the phpChess
////////////////////////////////////////////////////////////////////////

$conf['database_host'] = "localhost";
$conf['database_name'] = "phpchess";
$conf['database_login'] = "phpchess";
$conf['database_pass'] = "CHESS@sudocode69";

$conf['site_name'] = "OggyP Chess";
$conf['site_url'] = "http://chess.oggyp.com/play/";
$conf['registration_email'] = "chess@oggyp.com";

$conf['session_timeout_sec'] = 3600;

$conf['password_salt'] = "q^w~X}Vy}()>?*`l3";

$conf['new_user_requires_approval'] = true;

$conf['chat_refresh_rate'] = 10;

$conf['absolute_directory_location'] = "/var/www/oggyp.com/chess/play/";

$conf['avatar_absolute_directory_location'] = "/var/www/oggyp.com/chess/play/avatars/";
$conf['avatar_image_disk_size_in_bytes'] = 102400;
$conf['avatar_image_width'] = 100;
$conf['avatar_image_height'] = 100;

$conf['view_chess_games_refresh_rate'] = 30;		// Number of seconds between updates when viewing games available.
$conf['last_move_check_rate'] = 10;			// Number of seconds between new move checks in realtime games.

?>