<?php

// type declaration
declare(strict_types=1);

function set_work_session(object $pdo, string $employee_id)
{
    $query = "INSERT INTO work_sessions (employee_id, start_timestamp) VALUES (:employee_id, NOW());";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":employee_id", $employee_id);
    $stmt->execute();
    $work_session_id = $pdo->lastInsertId();

    return $work_session_id;
}

function update_work_session(object $pdo, string $work_session_id, $worked_hours)
{
    $query = 'UPDATE work_sessions SET end_timestamp = NOW(), worked_hours = :new_worked_hours WHERE session_id = :work_session_id';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':work_session_id', $work_session_id);
    $stmt->bindParam(':new_worked_hours', $worked_hours);

    $stmt->execute();
}
