<?php

// type declaration
declare(strict_types=1);

function get_employee_list(object $pdo, $sup_id)
{
    $query = "SELECT
    se.sup_id AS sup_id,
    se.emp_id AS emp_id,
    u.username AS username,
    u.image_path AS image_path,
    (
    SELECT
        COUNT(*)
    FROM
        task_emp_map
    JOIN tasks ON task_emp_map.task_id = tasks.task_id
    WHERE
        tasks.task_status = '0' AND task_emp_map.user_id = se.emp_id
    ) AS tasks_completed,
    (
    SELECT
        COUNT(*)
    FROM
        task_emp_map
    JOIN tasks ON task_emp_map.task_id = tasks.task_id
    WHERE
        tasks.task_status = '1' AND task_emp_map.user_id = se.emp_id
    ) AS tasks_pending
    FROM
    sup_emp_map se
    JOIN users u ON
    se.emp_id = u.user_id
    WHERE
    se.sup_id = :sup_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":sup_id", $sup_id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
