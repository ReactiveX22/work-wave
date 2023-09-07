<?php
require_once 'includes/config_session.inc.php';

$isDarkMode = isset($_COOKIE["isDarkMode"]) ? $_COOKIE["isDarkMode"] === "1" : true;

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$validPages = ['home', 'login', 'signup'];
$validDashboardPages = ['tasks', 'assign_task', 'submit_task', 'view_task', 'assign_sup', 'dashboard', 'profile', 'settings_update_pw', 'dashboard_sup', 'request_role', 'request_payments', 'manage_payments', 'create_task'];

if (!in_array($page, array_merge($validPages, $validDashboardPages))) {
    $page = 'home';
}

$role = isset($_SESSION["user_role_id"]) ? $_SESSION["user_role_id"] : '';

$routes = [
    'SUP' => [
        'sidebar' => 'includes/sidebar_sup.php',
        'dashboard' => 'pages/dashboard_sup.php',
        'tasks' => 'pages/tasks_sup.php'
    ],
    'ADM' => [
        'sidebar' => 'includes/sidebar_admin.php',
        'dashboard' => 'pages/dashboard_admin.php',
        'tasks' => 'pages/work.php'
    ],
    'EMP' => [
        'sidebar' => 'includes/sidebar_emp.php',
        'dashboard' => 'pages/dashboard_emp.php',
        'tasks' => 'pages/tasks_emp.php',
        'submit_task' => 'pages/submit_task.php'
    ],
    'default' => [
        'sidebar' => 'includes/sidebar.php',
        'dashboard' => 'pages/dashboard.php',
        'tasks' => 'pages/tasks.php'
    ]
];

if (in_array($page, $validDashboardPages)) {
    include_once 'includes/header_dashboard.php';
    include_once $routes[$role]['sidebar'] ?? $routes['default']['sidebar'];
    include_once $routes[$role][$page] ?? 'pages/' . $page . '.php';
    include_once 'scripts/theme-toggle.php';
} elseif (in_array($page, $validPages)) {
    include_once 'includes/header.php';
    include_once 'pages/' . $page . '.php';
    include_once 'includes/footer.php';
    include_once 'scripts/theme-toggle.php';
}
