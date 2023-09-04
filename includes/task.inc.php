<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $task_name = $_POST["task_name"];
    $task_desc = $_POST["task_desc"];
    $due_date = date('Y-m-d', strtotime($_POST['due_date']));
    try {
        require_once 'db-handler.php';
        require_once 'settings_contr.inc.php';
        require_once 'task_model.inc.php';
        require_once 'config_session.inc.php';


        // error handlers
        $errors = [];

        if (is_input_empty($task_name, $task_desc, $due_date)) {
            $errors["empty_input"] = "Fill in all fields!";
        } else {
        }

        if ($errors) {
            $_SESSION['errors_login'] = $errors;
            header("Location: ../index.php?page=tasks");
            die();
        } else {
            create_task($pdo, $_SESSION["user_id"], $task_name, $task_desc, $due_date);
            $_SESSION['task_created'] = "Task is created";
        }

        header("Location: ../index.php?page=tasks");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    require_once 'config_session.inc.php';
    if (isset($_SESSION["user_id"])) {
        header("Location: ./index.php?page=dashboard");
    }

    // header("Location: ../index.php?page=home");
    // die();
}
