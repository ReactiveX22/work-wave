<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = $_POST["requested_amount"];

    try {
        require_once 'db-handler.php';
        require_once 'settings_contr.inc.php';
        require_once 'settings_model.inc.php';
        require_once 'settings_view.inc.php';
        require_once 'config_session.inc.php';


        // error handlers
        $errors = [];

        if (is_input_empty($amount)) {
            $errors["empty_input"] = "Empty Field";
        } else {
            if ($amount === '1k') {
                $requested_amount = 1000;
            } elseif ($amount === '10k') {
                $requested_amount = 10000;
            }
        }

        if ($errors) {
            $_SESSION['errors_login'] = $errors;
            header("Location: ../index.php?page=request_payments");
            die();
        } else {
            set_pending_balance($pdo, $_SESSION["user_id"], $requested_amount);
            $_SESSION["employee_pending_balance"] = get_user_total_pending_balance($pdo, $_SESSION["user_id"]);
            $_SESSION['password_changed'] = "Added Pending Balance";
        }

        header("Location: ../index.php?page=request_payments");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}

try {
    require_once 'db-handler.php';
    require_once 'settings_model.inc.php';
    require_once 'config_session.inc.php';


    $user_id = $_SESSION["user_id"];
    $employee_pending_balance = get_user_total_pending_balance($pdo, $user_id);
    $_SESSION["employee_pending_balance"] = !empty($employee_pending_balance) ? $employee_pending_balance : 0;
    $_SESSION["no_of_pb_req"] = get_total_nof_pb_req($pdo, $user_id);
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
