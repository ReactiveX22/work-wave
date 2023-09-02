<?php

// type declaration
declare(strict_types=1);

function get_pay_requests(object $pdo)
{
    $query = "SELECT * FROM pending_pay_reqs_view";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function approve_pay_request(object $pdo, $user_id, $pending_amount)
{
    set_pay_req_0($pdo, $user_id);
    add_balance($pdo, $user_id, $pending_amount);
    delete_pay_request($pdo, $user_id);
}

function delete_pay_request(object $pdo, $user_id)
{
    $query = "DELETE FROM pending_balances WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}

function add_balance(object $pdo, string $user_id, $amount)
{
    $query = "UPDATE balances SET balance = balance + :amount WHERE employee_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":amount", $amount);
    $stmt->execute();
}

function set_pay_req_0(object $pdo, string $user_id)
{
    $query = "UPDATE pending_balances SET is_pending = '0' WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}
