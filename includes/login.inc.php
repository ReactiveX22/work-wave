<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once 'db-handler.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // error handlers
        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        } else {
            $result = get_user($pdo, $username);
            if (is_username_wrong($result)) {
                $errors["login_incorrect"] = "Incorrect Login Info!";
            }
            if (is_username_wrong($result) || is_password_wrong($password, $result["password"])) {
                $errors["login_incorrect"] = "Incorrect Login Info!";
            }
            if (!is_user_active($result)) {
                $errors["login_incorrect"] = "User Does Not Exist!";
            }
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION['errors_login'] = $errors;

            header("Location: ../index.php?page=login");
            die();
        }

        // user
        $new_session_id = session_create_id();
        $session_id = $new_session_id . "_" . $result["user_id"];

        session_regenerate_id($session_id);


        $_SESSION['user_data'] = $result;
        $user_id = $_SESSION["user_id"] = $_SESSION['user_data']["user_id"];

        $user_role = get_user_role_name($pdo, $user_id);
        $user_role_id = get_user_role_id($pdo, $user_id);
        $_SESSION["user_role"] = $user_role;
        $_SESSION["user_role_id"] = $user_role_id;


        $pending_role_id = get_user_pending_role_id($pdo, $_SESSION["user_id"]);
        $_SESSION["user_pending_role"] = get_role_name($pdo, $pending_role_id);

        $_SESSION["user_username"] = $_SESSION['user_data']["username"];
        $_SESSION['user_email'] = $_SESSION['user_data']['email'];
        $_SESSION['user_hourly_rate'] = $_SESSION['user_data']['hourly_rate'];
        $_SESSION["employee_profile_pic"] = $_SESSION['user_data']["image_path"];

        $_SESSION["last_regeneration"] = time();

        header("Location: ../index.php?page=dashboard");

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
