<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $task_id = $_POST["task_id"];
    $action = $_POST["action"];

    try {
        require_once 'db-handler.php';
        require_once 'tasks_model.inc.php';
        require_once 'config_session.inc.php';

        $user_id = $_SESSION['user_data']['user_id'];

        // error handlers
        $errors = [];


        if ($action === 'approve') {
            set_task_0($pdo, $task_id);
        } elseif ($action === 'delete') {
            delete_task($pdo, $task_id);
        }

        $_SESSION['employee_task_list'] = $employee_task_list = get_employee_task_list($pdo, $user_id);


        if ($errors) {
        }

        header("Location: ../index.php?page=tasks");
        die();

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}

try {
    require_once 'db-handler.php';
    require_once 'task_model.inc.php';
    require_once 'config_session.inc.php';

    $_SESSION['employee_task_list'] = $employee_task_list = get_employee_task_list($pdo, $user_id);
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
