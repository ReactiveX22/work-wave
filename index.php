<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';

// theme-toggle stuff
$isDarkMode = isset($_COOKIE["isDarkMode"]) ? $_COOKIE["isDarkMode"] === "1" : true;

// routing
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$validPages = ['home', 'login', 'signup', 'errors'];

if (!in_array($page, $validPages)) {
    $page = 'home';
}


// header
include_once 'includes/header.php';

// main page
include_once 'pages/' . $page . '.php';

// footer
include_once 'includes/footer.php';

// scripts
include_once 'scripts/theme-toggle.php';
