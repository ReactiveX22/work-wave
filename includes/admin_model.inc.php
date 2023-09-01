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
    remove_role_req($pdo, $user_id);
    change_role($pdo, $user_id, $requested_role);
}

function change_role(object $pdo, string $user_id, string $new_role)
{
    $query = "UPDATE user_roles SET role_id = :new_role WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":new_role", $new_role);
    $stmt->execute();
}

function remove_role_req(object $pdo, string $user_id)
{
    $query = "UPDATE pending_role_reqs SET is_pending = '0' WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}
