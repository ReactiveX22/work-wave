<?php

// type declaration
declare(strict_types=1);

function is_input_empty(...$inputs)
{
    foreach ($inputs as $input) {
        if (empty($input)) {
            return true;
        }
    }
    return false;
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
