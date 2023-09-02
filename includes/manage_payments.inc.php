<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST["user_id"];
    $pending_amount = $_POST["pending_amount"];
    $action = $_POST["action"];

    try {
        require_once 'db-handler.php';
        require_once 'manage_pay_model.inc.php';
        require_once 'manage_pay_contr.inc.php';
        require_once 'config_session.inc.php';

        // error handlers
        $errors = [];

        if (is_input_empty($user_id, $pending_amount)) {
            $errors["empty_input"] = "Fill in all fields!";
        } else {
            if ($action === 'approve') {
                approve_pay_request($pdo, $user_id, $pending_amount);
            } elseif ($action === 'delete') {
                delete_pay_request($pdo, $user_id);
            }

            $_SESSION['pay_req_list'] = get_pay_requests($pdo);
        }

        if ($errors) {
        }

        header("Location: ../index.php?page=manage_payments");
        die();

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}

try {
    require_once 'db-handler.php';
    require_once 'manage_pay_model.inc.php';
    require_once 'config_session.inc.php';

    $_SESSION['pay_req_list'] = get_pay_requests($pdo);
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
