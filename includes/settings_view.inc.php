<?php

// type declaration
declare(strict_types=1);

try {
    require_once 'db-handler.php';
    require_once 'settings_model.inc.php';
    require_once 'config_session.inc.php';

    $employee_id = $_SESSION["user_id"];

    $pending_role_id = get_user_pending_role_id($pdo, $employee_id);
    $pending_role_name = get_role_name($pdo, $pending_role_id);

    $_SESSION["user_pending_role"] = isset($pending_role_name) ? $pending_role_name : 'No Role';
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}

function check_login_errors()
{
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];

        echo '<div id="error-box" class="error-box">';
        echo '<div class="error-icon">';
        echo '<i class="fa-solid fa-circle-exclamation"></i>';
        echo '</div>';
        echo '<div class="error-msg">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
        echo '</div>';

        unset($_SESSION['errors_login']);
    } elseif (isset($_SESSION['password_changed'])) {
        echo '<div id="error-box" class="success-box">';
        echo '<div class="error-icon">';
        echo '<i class="fa-solid fa-circle-exclamation"></i>';
        echo '</div>';
        echo '<div class="error-msg">';
        echo '<p>' . $_SESSION['password_changed'] . '</p>';
        echo '</div>';
        echo '</div>';

        unset($_SESSION['password_changed']);
    }
}
