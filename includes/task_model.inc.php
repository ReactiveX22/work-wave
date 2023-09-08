<?php

// type declaration
declare(strict_types=1);

function create_task(object $pdo, $user_id, $task_name, $task_desc, $due_date)
{
    $query = "INSERT INTO tasks (task_name, task_desc, due_date) VALUES (:task_name, :task_desc, :due_date);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":task_name", $task_name);
    $stmt->bindParam(":task_desc", $task_desc);
    $stmt->bindParam(":due_date", $due_date);

    $stmt->execute();

    $task_id = $pdo->lastInsertId();
    assign_sup_task($pdo, $user_id, $task_id);
}

function assign_sup_task(object $pdo, $user_id, $task_id)
{
    $query = "INSERT INTO task_sup_map (task_id, user_id) VALUES (:task_id, :user_id);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}

function assign_task(object $pdo, $user_id, $task_id)
{
    $query = "INSERT INTO task_emp_map (task_id, user_id) VALUES (:task_id, :user_id);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}

function delete_task(object $pdo, $task_id)
{
    $query1 = "DELETE FROM task_emp_map WHERE task_id = :task_id;";
    $stmt = $pdo->prepare($query1);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->execute();

    $query1 = "DELETE FROM task_files WHERE task_id = :task_id;";
    $stmt = $pdo->prepare($query1);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->execute();

    $query2 = "DELETE FROM tasks WHERE task_id = :task_id;";
    $stmt = $pdo->prepare($query2);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->execute();
}

function set_task_0(object $pdo, string $task_id)
{
    $query = "UPDATE tasks SET task_status = '0' WHERE task_id = :task_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->execute();
}

function set_task_file(object $pdo, $user_id, $task_id, string $file_path)
{
    $query = "INSERT INTO task_files (user_id, task_id, file_path, upload_date) VALUES (:user_id, :task_id, :file_path, NOW());";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":file_path", $file_path);
    $stmt->execute();
}

function get_task_name(object $pdo, $task_id)
{
    $query = "SELECT task_name FROM tasks WHERE task_id = :task_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["task_name"];
}

function get_task_desc(object $pdo, $task_id)
{
    $query = "SELECT task_desc FROM tasks WHERE task_id = :task_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["task_desc"];
}

function get_task_done_percentage(object $pdo, $task_id, $user_id)
{
    $query = "SELECT 
    CONCAT(ROUND((COUNT(CASE WHEN tf.file_path IS NOT NULL THEN 1 END) / COUNT(*)) * 100, 2), '%') as done_percentage
FROM task_emp_map tem
JOIN users u ON u.user_id = tem.user_id
LEFT JOIN task_files tf ON tf.user_id = tem.user_id
WHERE tem.task_id = :task_id
    AND tem.user_id <> :user_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["done_percentage"];
}

function get_task_assigned_to_list(object $pdo, $task_id)
{
    $query = "SELECT
    u.username,
    u.image_path,
    CASE
        WHEN tf.user_id IS NOT NULL THEN 'Yes'
        ELSE 'No'
    END AS has_file,
    CASE
        WHEN tf.user_id IS NOT NULL THEN tf.file_path
        ELSE NULL
    END AS file_path
FROM
    users u
JOIN
    (
        SELECT DISTINCT user_id
        FROM task_emp_map
        WHERE task_id = 11
    ) AS tm
ON
    u.user_id = tm.user_id
LEFT JOIN
    task_files tf
ON
    u.user_id = tf.user_id AND tf.task_id = :task_id;
";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
