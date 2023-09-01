<?php

// type declaration
declare(strict_types=1);

function get_role_requests(object $pdo)
{
    $query = "SELECT * FROM pending_role_reqs_view";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function approve_role_request(object $pdo, $user_id, $requested_role)
{
    set_role_req_0($pdo, $user_id);
    change_role($pdo, $user_id, $requested_role);
}

function delete_role_request(object $pdo, $user_id, $requested_role)
{
    $query = "DELETE FROM pending_role_reqs WHERE user_id = :user_id AND requested_role = :requested_role;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":requested_role", $requested_role);
    $stmt->execute();
}

function change_role(object $pdo, string $user_id, string $new_role)
{
    $query = "UPDATE user_roles SET role_id = :new_role WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":new_role", $new_role);
    $stmt->execute();
}

function set_role_req_0(object $pdo, string $user_id)
{
    $query = "UPDATE pending_role_reqs SET is_pending = '0' WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}