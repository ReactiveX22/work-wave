<?php
require_once 'includes/config_session.inc.php';

// theme-toggle stuff
$isDarkMode = isset($_COOKIE["isDarkMode"]) ? $_COOKIE["isDarkMode"] === "1" : true;

// routing
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$validPages = ['home', 'login', 'signup'];
$validDashboardPages = ['work', 'dashboard'];

if (!in_array($page, $validPages) && !in_array($page, $validDashboardPages)) {
    $page = 'home';
}

if (in_array($page, $validDashboardPages)) {
    // header
    include_once 'includes/header_dashboard.php';
    include_once 'includes/sidebar.php';

    // main page
    include_once 'pages/' . $page . '.php';

    // scripts
    include_once 'scripts/theme-toggle.php';
} else {
    // header
    include_once 'includes/header.php';

    // main page
    include_once 'pages/' . $page . '.php';

    // footer
    include_once 'includes/footer.php';

    // scripts
    include_once 'scripts/theme-toggle.php';
}
