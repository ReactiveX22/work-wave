<?php

// type declaration
declare(strict_types=1);

function is_input_empty(string $old_password, string $new_password, string $confirm_password)
{
    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong(string $password_from_user, $password_from_db)
{
    if ($password_from_user === $password_from_db) {
        return false;
    } else {
        return true;
    }
}

function is_password_match(string $new_password, string $confirm_password)
{
    if ($new_password === $confirm_password) {
        return false;
    } else {
        return true;
    }
}
