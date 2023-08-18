<?php

// type declaration
declare(strict_types=1);

function check_login_errors()
{
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];

        echo '<div id="error-box" class="error-box">';
        echo '<div class="error-icon">';
        echo '<i class="fa-solid fa-circle-exclamation"></i>';
        echo '</div>';
        echo '<div class="error-msg">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
        echo '</div>';

        unset($_SESSION['errors_login']);
    } elseif (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo '<div id="error-box" class="success-box">';
        echo '<div class="error-icon">';
        echo '<i class="fa-solid fa-circle-exclamation"></i>';
        echo '</div>';
        echo '<div class="error-msg">';
        echo '<p>' . "Login SUCCESS!" . '</p>';
        echo '</div>';
        echo '</div>';
    }
}
