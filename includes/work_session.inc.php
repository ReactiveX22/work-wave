<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $hours = $_POST["hour_amount"];

    try {
        require_once 'db-handler.php';
        require_once 'work_session_model.inc.php';
        require_once 'work_session_contr.inc.php';

        // error handlers
        $errors = [];
        require_once '../includes/config_session.inc.php';
        $employee_id = $_SESSION["user_id"];


        if (empty($hours)) {
            $errors["empty_input"] = "Fill in all fields!";
        } else {
            if ($hours === "1hr") {
                $new_work_session_id = set_work_session($pdo, $employee_id);
                update_work_session($pdo, $new_work_session_id, 1);
            } elseif ($hours === "10hr") {
                $new_work_session_id = set_work_session($pdo, $employee_id);
                update_work_session($pdo, $new_work_session_id, 10);
            }
        }

        if ($errors) {
            $_SESSION['errors_login'] = $errors;

            header("Location: ../index.php?page=dashboard");
            die();
        }

        header("Location: ../index.php?page=work");

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
