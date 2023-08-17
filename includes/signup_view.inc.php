<?php

// type declaration
declare(strict_types=1);

function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

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

        unset($_SESSION['errors_signup']);
    }
}
