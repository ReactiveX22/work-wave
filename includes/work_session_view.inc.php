<?php

// type declaration
declare(strict_types=1);

function check_add_work_hours_errors()
{
    if (isset($_SESSION['errors_add_work_hours'])) {
        $errors = $_SESSION['errors_add_work_hours'];

        echo '<div id="error-box" class="success-box">';
        echo '<div class="error-icon">';
        echo '<i class="fa-solid fa-circle-exclamation"></i>';
        echo '</div>';
        echo '<div class="error-msg">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
        echo '</div>';

        unset($_SESSION['errors_add_work_hours']);
    }
}
