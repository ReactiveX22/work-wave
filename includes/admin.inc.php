<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST["user_id"];
    $requested_role = $_POST["requested_role"];
    $action = $_POST["action"];

    try {
        require_once 'db-handler.php';
        require_once 'admin_model.inc.php';
        require_once 'admin_contr.inc.php';
        require_once 'config_session.inc.php';

        // error handlers
        $errors = [];

        if (is_input_empty($user_id, $requested_role)) {
            $errors["empty_input"] = "Fill in all fields!";
        } else {
            if ($action === 'approve') {
                approve_role_request($pdo, $user_id, $requested_role);
            } elseif ($action === 'delete') {
                delete_role_request($pdo, $user_id, $requested_role);
            }

            $_SESSION['role_req_list'] = get_role_requests($pdo);
        }

        if ($errors) {
        }

        header("Location: ../index.php?page=dashboard");
        die();

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}

try {
    require_once 'db-handler.php';
    require_once 'admin_model.inc.php';
    require_once 'config_session.inc.php';

    $_SESSION['role_req_list'] = get_role_requests($pdo);
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
