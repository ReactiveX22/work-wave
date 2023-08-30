<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    try {
        require_once 'db-handler.php';
        require_once 'settings_contr.inc.php';
        require_once 'settings_model.inc.php';
        require_once 'settings_view.inc.php';
        require_once 'config_session.inc.php';

        $username = $_SESSION["user_username"];

        // error handlers
        $errors = [];

        if (is_input_empty($old_password, $new_password, $confirm_password)) {
            $errors["empty_input"] = "Fill in all fields!";
        } else {
            $result = get_user($pdo, $username);

            if (is_password_match($new_password, $confirm_password)) {
                $errors["login_incorrect"] = "Passwords do not match!";
            }
            if (is_password_wrong($old_password, $result["password"])) {
                $errors["login_incorrect"] = "Wrong Password!";
            }
        }

        if ($errors) {
            $_SESSION['errors_login'] = $errors;

            header("Location: ../index.php?page=settings");
            die();
        } else {
            change_password($pdo, $_SESSION["user_id"], $new_password);
            $_SESSION['password_changed'] = "Password is changed";
        }

        header("Location: ../index.php?page=settings");
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
