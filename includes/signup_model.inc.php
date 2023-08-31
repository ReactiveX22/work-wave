<?php

// type declaration
declare(strict_types=1);

function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function set_user(object $pdo, string $username, string $password, string $email, string $image_path)
{
    $query = "INSERT INTO users (username, password, email, image_path) VALUES (:username, :password, :email, :image_path);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":image_path", $image_path);

    $stmt->execute();

    $user_id = get_user_id($pdo, $username);
    set_user_role($pdo, $user_id, 'EMP');
}

function get_user_id(object $pdo, string $username)
{
    $query = "SELECT user_id FROM users WHERE username = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["user_id"];
}

function set_user_role(object $pdo, $user_id, $role_id)
{
    $query = "INSERT INTO user_roles (user_id, role_id) VALUES (:user_id, :role_id);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":role_id", $role_id);
    $stmt->execute();
}
