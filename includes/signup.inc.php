<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once 'db-handler.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // error handlers
        $errors = [];

        if (is_input_empty($username, $password, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already resisterd";
        }

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;

            header("Location: ../index.php?page=signup");
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: errors.php");
    die();
}
