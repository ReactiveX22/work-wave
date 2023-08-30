<?php

// type declaration
declare(strict_types=1);

function change_password(object $pdo, string $user_id, string $new_password)
{
    $query = "UPDATE employees SET password = :new_password WHERE employee_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":new_password", $new_password);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_user(object $pdo, string $username,)
{
    $query = "SELECT * FROM employees WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
