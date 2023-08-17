<?php

// type declaration
declare(strict_types=1);


function is_input_empty(string $username, string $password, string $email, $profile_pic_file)
{
    if (empty($username) || empty($password) || empty($email) || empty($profile_pic_file)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

function is_username_taken(object $pdo, string $username)
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $username, string $password, string $email, $profile_pic_file)
{
    $image_path = rename_file($profile_pic_file, $username);

    set_user($pdo, $username, $password, $email, $image_path);
}


// profile-pic handling

function get_file_name($file)
{
    if (!empty($file)) {
        return $file['name'];
    }
}

function is_file_size_too_big($file)
{
    $file_size = $file['size'];
    $max_file_size = 50 * 1024 * 1024;
    if ($file_size > $max_file_size) {
        return true;
    } else {
        return false;
    }
}

function get_actual_filetype($file)
{
    if (!empty($file)) {
        $file_name = get_file_name($file);

        $file_ext = explode('.', $file_name);
        return $file_actual_ext = strtolower(end($file_ext));
    }
}

function is_file_wrong_type($file)
{
    $file_actual_ext = get_actual_filetype($file);

    $allowed_ext = array('jpg', 'jpeg', 'png');

    if (in_array($file_actual_ext, $allowed_ext)) {
        return false;
    } else {
        return true;
    }
}

function rename_file($file, $username)
{
    return $file_name_new = $username . "." . get_actual_filetype($file);
}
