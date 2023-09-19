<?php

try {
    require_once 'db-handler.php';
    require_once 'tasks_list_model.inc.php';
    require_once 'config_session.inc.php';

    $user_id = $_SESSION['user_data']['user_id'];

    if ($_SESSION["user_role_id"] === 'SUP') {
        $_SESSION['employee_task_list'] = $employee_task_list = get_employee_task_list($pdo, $user_id);
    } elseif ($_SESSION["user_role_id"] === 'EMP') {
        $_SESSION['employee_task_list'] = $employee_task_list = get_employee_assigned_task_list($pdo, $user_id);
    }
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
