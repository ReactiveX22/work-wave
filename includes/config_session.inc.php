<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params(
    [
        'lifetime' => 1800,
        'domain' => 'localhost',
        'path' => '/',
        'secure' => true,
        'httponly' => true,
    ]
);

session_start();

//change session id

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id_loggedin();
    } else {
        $interval = 45 * 60;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id_loggedin();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
    } else {
        $interval = 45 * 60;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
        }
    }
}


function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
    header("Location: ./index.php?page=login");
}

function regenerate_session_id_loggedin()
{
    session_regenerate_id(true);

    $new_session_id = session_create_id();
    $session_id = $new_session_id . "_" . $_SESSION["user_id"];
    session_id($session_id);

    $_SESSION["last_regeneration"] = time();
    header("Location: ./index.php?page=login");
}
