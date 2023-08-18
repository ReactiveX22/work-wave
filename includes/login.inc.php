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
        }

        require_once '../includes/config_session.inc.php';

        if ($errors) {
            $_SESSION['errors_login'] = $errors;

            header("Location: ../index.php?page=login");
            die();
        }

        // user

        $new_session_id = session_create_id();
        $session_id = $new_session_id . "_" . $result["id"];
        session_id($session_id);

        $_SESSION['user_data'] = $result;

        $_SESSION["user_id"] = $_SESSION['user_data']["employee_id"];
        $_SESSION["user_username"] = htmlspecialchars($_SESSION['user_data']["username"]);
        $_SESSION['user_email'] = $_SESSION['user_data']['email'];
        $_SESSION['user_hourly_rate'] = $_SESSION['user_data']['hourly_rate'];


        $_SESSION["last_regeneration"] = time();


        header("Location: ../index.php?page=dashboard");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php?page=home");
    die();
}
