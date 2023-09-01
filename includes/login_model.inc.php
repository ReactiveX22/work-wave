<?php

// type declaration
declare(strict_types=1);

function get_user(object $pdo, string $username)
{
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_user_role_name(object $pdo, $user_id)
{
    $query = "SELECT role_name FROM user_roles_view WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["role_name"];
}

function get_user_role_id(object $pdo, $user_id)
{
    $query = "SELECT role_id FROM user_roles_view WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["role_id"];
}

function get_user_pending_role_id(object $pdo, $user_id)
{
    $query = "SELECT requested_role FROM pending_role_reqs WHERE user_id = :user_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['requested_role'];
}

function get_role_name(object $pdo, $role_id)
{
    $query = "SELECT role_name FROM roles WHERE role_id = :role_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":role_id", $role_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["role_name"];
}
