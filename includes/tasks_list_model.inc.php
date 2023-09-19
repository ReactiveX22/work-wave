<?php

// type declaration
declare(strict_types=1);

function get_employee_task_list(object $pdo, $user_id)
{
    // $query = "SELECT tasks.task_id, tasks.task_name, tasks.due_date, tasks.task_status FROM tasks JOIN task_emp_map ON tasks.task_id = task_emp_map.task_id JOIN users ON task_emp_map.user_id = users.user_id WHERE users.user_id = :user_id;";

    $query = "SELECT
    tasks.task_id,
    tasks.task_name,
    tasks.due_date,
    tasks.task_status,
    CONCAT(
        ROUND(
            (
                CASE
                    WHEN COUNT(DISTINCT tem.user_id) = 0 OR COUNT(DISTINCT tf.user_id) = 0
                    THEN 0 
                    ELSE (COUNT(DISTINCT tf.user_id) / COUNT(DISTINCT tem.user_id)) * 100
                END
            ),
            2
        ),
        '%'
    ) AS done_percentage
FROM
    tasks
LEFT JOIN
    task_emp_map tem ON tasks.task_id = tem.task_id AND tem.user_id <> :user_id
LEFT JOIN
    task_files tf ON tf.user_id = tem.user_id AND tf.task_id = tem.task_id
JOIN
    task_sup_map tsm ON tsm.task_id = tasks.task_id AND tsm.user_id = :user_id
GROUP BY
    tasks.task_id,
    tasks.task_name,
    tasks.due_date,
    tasks.task_status;
";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_employee_assigned_task_list(object $pdo, $user_id)
{
    // $query = "SELECT tasks.task_id, tasks.task_name, tasks.due_date, tasks.task_status FROM tasks JOIN task_emp_map ON tasks.task_id = task_emp_map.task_id JOIN users ON task_emp_map.user_id = users.user_id WHERE users.user_id = :user_id;";

    $query = "SELECT
    tasks.task_id,
    tasks.task_name,
    tasks.due_date,
    tasks.task_status
FROM
    tasks
JOIN
    task_emp_map tem ON tasks.task_id = tem.task_id AND tem.user_id = :user_id
";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
