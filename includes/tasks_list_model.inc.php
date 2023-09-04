<?php

// type declaration
declare(strict_types=1);

function get_employee_task_list(object $pdo, $user_id)
{
    $query = "SELECT tasks.task_id, tasks.task_name, tasks.due_date, tasks.task_status FROM tasks JOIN task_emp_map ON tasks.task_id = task_emp_map.task_id JOIN users ON task_emp_map.user_id = users.user_id WHERE users.user_id = :user_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
