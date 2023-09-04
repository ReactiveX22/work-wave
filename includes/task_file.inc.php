<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $task_id = $_POST["task_id"];
    $task_file = $_FILES["task_file"];

    try {
        require_once 'db-handler.php';
        require_once 'config_session.inc.php';
        require_once 'task_model.inc.php';
        require_once 'task_contr.inc.php';

        // error handlers
        $errors = [];

        if (is_input_empty($task_id, $task_file)) {
            $errors["empty_input"] = "Fill in all fields!";
        } else {
            if (is_file_wrong_type($task_file)) {
                $errors["wrong-filetype"] = "Wrong file type!";
            } elseif (is_file_size_too_big($task_file)) {
                $errors["file-toobig"] = "File size is too big!";
            }
        }

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;

            $signup_data = [
                "username" => $username,
                "email" => $email,
            ];

            $_SESSION["signup_data"] = $signup_data;

            header("Location: ../index.php?page=submit_task");
            die();
        }

        submit_task($pdo, $_SESSION["user_username"], $_SESSION["user_id"], $task_id, $task_file);

        header("Location: ../index.php?page=submit_task");
        die();

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: errors.php");
    die();
}
