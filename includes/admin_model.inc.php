<?php

// type declaration
declare(strict_types=1);

function get_role_requests(object $pdo)
{
    $query = "SELECT * FROM (SELECT prr.user_id, u.username, u.image_path, prr.requested_role, prr.requested_date, prr.is_pending FROM pending_role_reqs prr JOIN users u ON prr.user_id = u.user_id) as subquery";

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
    delete_role_request($pdo, $user_id);
}

function delete_role_request(object $pdo, $user_id)
{
    $query = "DELETE FROM pending_role_reqs WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
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

function get_emp_list(object $pdo)
{
    $query = "SELECT u.username, u.user_id AS emp_id
FROM users u
JOIN user_roles ur ON u.user_id = ur.user_id
WHERE ur.role_id = 'EMP';
";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_sup_list(object $pdo)
{
    $query = "SELECT u.username, u.user_id AS sup_id
FROM users u
JOIN user_roles ur ON u.user_id = ur.user_id
WHERE ur.role_id = 'SUP';
";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function assign_sup(object $pdo, $sup_id, $emp_id)
{
    $query = "INSERT INTO sup_emp_map (sup_id, emp_id) VALUES (:sup_id, :emp_id);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":sup_id", $sup_id);
    $stmt->bindParam(":emp_id", $emp_id);
    $stmt->execute();
}
