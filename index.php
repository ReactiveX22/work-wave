<?php
require_once 'includes/config_session.inc.php';

// theme-toggle stuff
$isDarkMode = isset($_COOKIE["isDarkMode"]) ? $_COOKIE["isDarkMode"] === "1" : true;

// routing
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$validPages = ['home', 'login', 'signup'];
$validDashboardPages = ['work', 'dashboard', 'profile', 'settings_update_pw', 'dashboard_sup'];

if (!in_array($page, $validPages) && !in_array($page, $validDashboardPages)) {
    $page = 'home';
}

if (in_array($page, $validDashboardPages)) {
    // header
    include_once 'includes/header_dashboard.php';

    if ($_SESSION["user_role_id"] === 'SUP') {
        include_once 'includes/' . 'sidebar_sup' . '.php';
    } elseif ($_SESSION["user_role_id"] === 'ADM') {
        include_once 'includes/' . 'sidebar_admin' . '.php';
    } elseif ($_SESSION["user_role_id"] === 'EMP') {
        include_once 'includes/' . 'sidebar_emp' . '.php';
    } else {
        include_once 'includes/sidebar.php';
    }


    // main page
    if ($page === 'dashboard') {
        if ($_SESSION["user_role_id"] === 'SUP') {
            include_once 'pages/' . 'dashboard_sup' . '.php';
        } elseif ($_SESSION["user_role_id"] === 'ADM') {
            include_once 'pages/' . 'dashboard_admin' . '.php';
        } elseif ($_SESSION["user_role_id"] === 'EMP') {
            include_once 'pages/' . 'dashboard_emp' . '.php';
        }
    } else {
        include_once 'pages/' . $page . '.php';
    }

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
