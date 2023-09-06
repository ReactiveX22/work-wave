<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST["user_id"];
    $requested_role = $_POST["requested_role"];
    $action = $_POST["action"];

    $sup_id = $_POST["sup_id"];
    $emp_id = $_POST["emp_id"];

    try {
        require_once 'db-handler.php';
        require_once 'admin_model.inc.php';
        require_once 'admin_contr.inc.php';
        require_once 'config_session.inc.php';

        // error handlers
        $errors = [];


        if ($action === 'approve') {
            approve_role_request($pdo, $user_id, $requested_role);
        } elseif ($action === 'delete') {
            delete_role_request($pdo, $user_id);
        } elseif ($action === 'assign-sup') {
            assign_sup($pdo, $sup_id, $emp_id);

            header("Location: ../index.php?page=assign_sup");
            die();
        }

        $_SESSION['role_req_list'] = get_role_requests($pdo);


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
    $_SESSION['sup_list'] = get_sup_list($pdo);
    $_SESSION['emp_list'] = get_emp_list($pdo);
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
