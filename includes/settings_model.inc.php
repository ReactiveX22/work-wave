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

function is_user_has_req_role(object $pdo, $user_id)
{
    $query = "SELECT * FROM pending_role_reqs WHERE user_id = :user_id AND is_pending = '1';";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function get_role_name(object $pdo, $role_id)
{
    $query = "SELECT role_name FROM roles WHERE role_id = :role_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":role_id", $role_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        return $result["role_name"];
    }
}

function set_pending_req_role(object $pdo, $user_id, $req_role)
{
    $query = "INSERT INTO pending_role_reqs (user_id, requested_role, requested_date) VALUES (:user_id, :req_role, NOW());";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":req_role", $req_role);

    $stmt->execute();
}

function get_user_pending_role_id(object $pdo, $user_id)
{
    $query = "SELECT requested_role FROM pending_role_reqs WHERE user_id = :user_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        return $result["requested_role"];
    }
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
