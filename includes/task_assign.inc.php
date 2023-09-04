<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $task_id = $_POST["task_id"];
    $user_id = $_POST["user_id"];
    try {
        require_once 'db-handler.php';
        require_once 'settings_contr.inc.php';
        require_once 'task_model.inc.php';
        require_once 'config_session.inc.php';


        // error handlers
        // $errors = [];

        // if (is_input_empty($task_id, $emp_set)) {
        //     $errors["empty_input"] = "Fill in all fields!";
        // } else {
        // }

        // if ($errors) {
        //     $_SESSION['errors_login'] = $errors;
        //     header("Location: ../index.php?page=dashboard");
        //     die();
        // } else {
        // }

        assign_task($pdo, $user_id, $task_id);

        header("Location: ../index.php?page=assign_task");
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
