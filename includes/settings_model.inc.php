<?php

// type declaration
declare(strict_types=1);

function change_password(object $pdo, string $user_id, string $new_password)
{
    $query = "UPDATE users SET password = :new_password WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":new_password", $new_password);
    $stmt->execute();
}

function get_user(object $pdo, string $username)
{
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
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

function get_user_role_name(object $pdo, $user_id)
{
    $query = "SELECT role_name FROM user_roles_view WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["role_name"];
}

function change_role(object $pdo, string $user_id, string $new_role)
{
    $query = "UPDATE user_roles SET role_id = :new_role WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":new_role", $new_role);
    $stmt->execute();
}

function get_user_total_pending_balance(object $pdo, $user_id)
{
    $query = "SELECT user_id, SUM(pending_amount) AS total_pending_balances FROM pending_balances WHERE user_id = :user_id AND is_pending = '1' GROUP BY user_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_pending_balances'];
}


function set_pending_balance(object $pdo, string $user_id, $pending_amount)
{
    $query = "INSERT INTO pending_balances (user_id, pending_amount, requested_date) VALUES (:user_id, :pending_amount, NOW());";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":pending_amount", $pending_amount);

    $stmt->execute();
}
