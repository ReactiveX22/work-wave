<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $requested_role = $_POST["role"];

    try {
        require_once 'db-handler.php';
        require_once 'settings_contr.inc.php';
        require_once 'settings_model.inc.php';
        require_once 'settings_view.inc.php';
        require_once 'config_session.inc.php';

        $username = $_SESSION["user_username"];

        // error handlers
        $errors = [];

        if (is_input_empty($requested_role)) {
            $errors["empty_input"] = "Empty Field";
        } else {

            if ($requested_role === 'employee') {
                $role = 'EMP';
            } elseif ($requested_role === 'supervisor') {
                $role = 'SUP';
            } elseif ($requested_role === 'admin') {
                $role = 'ADM';
            }


            $result = get_user($pdo, $username);
            $current_role = get_user_role_id($pdo, $result["user_id"]);
            $pending_role_id = get_user_pending_role_id($pdo, $result["user_id"]);
            $_SESSION["user_pending_role"] = get_role_name($pdo, $pending_role_id);


            if ($role === $current_role) {
                $errors["login_incorrect"] = "You already have the role!";
            } elseif (is_user_has_req_role($pdo, $result["user_id"])) {
                $errors["login_incorrect"] = "Cannot Request Another Role!";
            }
        }

        if ($errors) {
            $_SESSION['errors_login'] = $errors;
            header("Location: ../index.php?page=request_role");
            die();
        } else {
            set_pending_req_role($pdo, $_SESSION["user_id"], $role);
            $_SESSION["user_role"] = get_user_role_name($pdo, $_SESSION["user_id"]);
            $_SESSION["user_role_id"] = get_user_role_id($pdo, $_SESSION["user_id"]);
            $_SESSION["user_pending_role"] = get_role_name($pdo, $pending_role_id);
            $_SESSION['password_changed'] = "Your role is requested.";
        }

        header("Location: ../index.php?page=request_role");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    require_once 'config_session.inc.php';
    if (isset($_SESSION["user_id"])) {
        header("Location: ./index.php?page=request_role");
        die();
    }

    // header("Location: ../index.php?page=home");
    // die();
}
