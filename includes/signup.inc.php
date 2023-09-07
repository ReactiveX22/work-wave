<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $profile_pic_file = $_FILES["prfl-pic"];

    try {
        require_once 'db-handler.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // error handlers
        $errors = [];

        if (is_input_empty($username, $password, $email, $profile_pic_file)) {
            $errors["empty_input"] = "Fill in all fields!";
        } else {
            if (is_email_invalid($email)) {
                $errors["invalid_email"] = "Invalid email used!";
            }
            if (is_username_taken($pdo, $username)) {
                $errors["username_taken"] = "Username already taken!";
            }
            if (is_email_registered($pdo, $email)) {
                $errors["email_used"] = "Email already resisterd!";
            }
            if (is_file_wrong_type($profile_pic_file)) {
                $errors["wrong-filetype"] = "Wrong file type!";
            } elseif (is_file_size_too_big($profile_pic_file)) {
                $errors["file-toobig"] = "File size is too big!";
            }
        }

        require_once '../includes/config_session.inc.php';

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;

            $signup_data = [
                "username" => $username,
                "email" => $email,
            ];

            $_SESSION["signup_data"] = $signup_data;

            header("Location: ../index.php?page=signup");
            die();
        }

        // user
        create_user($pdo, $username, $password, $email, $profile_pic_file);

        header("Location: ../index.php?page=signup&signup=success");
        die();

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: errors.php");
    die();
}
