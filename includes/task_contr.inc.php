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

// file handling

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
        $file_name = $file['name'];

        $file_ext = explode('.', $file_name);
        return $file_actual_ext = strtolower(end($file_ext));
    }
}

function is_file_wrong_type($file)
{
    $file_actual_ext = get_actual_filetype($file);

    $allowed_ext = 'pdf';

    if ($file_actual_ext === $allowed_ext) {
        return false;
    } else {
        return true;
    }
}

function rename_file($file, $username, $task_name)
{
    return $file_name_new = $username . '-' . $task_name . "." . get_actual_filetype($file);
}

function submit_task(object $pdo, string $username, $user_id, $task_id, $task_file)
{
    $task_name = get_task_name($pdo, $task_id);

    $file_name = rename_file($task_file, $username, $task_name);
    $fileSavePath = '../profile_pics/' . $file_name;

    set_task_file($pdo, $user_id, $task_id, $file_name);

    move_uploaded_file($task_file['tmp_name'], $fileSavePath);
}
