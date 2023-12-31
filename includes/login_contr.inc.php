<?php

// type declaration
declare(strict_types=1);

function is_input_empty(string $username, string $password)
{
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function is_username_wrong($result)
{
    if (!$result) {
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

function is_user_active($result)
{
    if ($result['active'] === 0) {
        return false;
    } else {
        return true;
    }
}
