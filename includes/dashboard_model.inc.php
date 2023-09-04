<?php

// type declaration
declare(strict_types=1);

function get_total_worked_hours(object $pdo, $employee_id)
{
    $query = "SELECT employee_id, SUM(worked_hours) AS total_worked_hours FROM work_sessions WHERE employee_id = :employee_id GROUP BY employee_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":employee_id", $employee_id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_worked_hours'];
}

function get_work_sessions(object $pdo, $employee_id)
{
    $query = "SELECT * FROM work_sessions WHERE employee_id = :employee_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":employee_id", $employee_id);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_balance(object $pdo, $employee_id)
{
    $query = "SELECT balance FROM balances WHERE employee_id = :employee_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":employee_id", $employee_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        return 0;
    }

    return $result["balance"];
}

function get_user_total_pending_balance(object $pdo, $user_id)
{
    $query = "SELECT user_id, SUM(pending_amount) AS total_pending_balances FROM pending_balances WHERE user_id = :user_id AND is_pending = '1' GROUP BY user_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function get_worked_hours_array(object $pdo, $employee_id)
{
    $query = "SELECT * FROM work_sessions WHERE employee_id = :employee_id ORDER BY start_timestamp;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":employee_id", $employee_id);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $workedHoursArray = array();

    foreach ($results as $result) {
        $workedHoursArray[] = $result["worked_hours"];
    }

    return $workedHoursArray;
}

function getLast7Days()
{
    // Get today's date
    $today = date("M d", time());

    // Create an array to store the last 7 days
    $last7Days = [];

    // Iterate backwards from today to get the last 7 days
    for ($i = 0; $i < 7; $i++) {
        $day = date('M d', strtotime("-$i day"));
        $last7Days[] = $day;
    }

    return array_reverse($last7Days);
}

function get_days_and_worked_hours_arrays(object $pdo, $employee_id)
{
    // Step 1: Create an array of the last 7 days
    $last7Days = getLast7Days();

    // Initialize the output arrays
    $days = [];
    $workedHours = [];

    // Step 2: Retrieve the data from the database for the last 7 days
    $query = "SELECT DATE(end_timestamp) AS day, SUM(worked_hours) AS total_worked_hours
              FROM work_sessions
              WHERE employee_id = :employee_id AND end_timestamp >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
              GROUP BY day";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":employee_id", $employee_id);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Step 3: Iterate over the last 7 days array and assign the corresponding worked hours value
    foreach ($last7Days as $day) {
        $matched = false;

        foreach ($results as $row) {
            if (date('M d', strtotime($row['day'])) === $day) {
                $days[] = $day;
                $workedHours[] = $row['total_worked_hours'];
                $matched = true;
                break;
            }
        }

        if (!$matched) {
            $days[] = $day;
            $workedHours[] = 0;
        }
    }

    // Step 4: Return the modified array as a JSON-encoded string
    return json_encode(array($days, $workedHours));
}

function get_emp_total_task_done(object $pdo, $user_id)
{
    $query = "SELECT COUNT(*) AS emp_total_task_done FROM task_emp_map JOIN tasks ON task_emp_map.task_id = tasks.task_id WHERE tasks.task_status = '0' AND task_emp_map.user_id = :user_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['emp_total_task_done'];
}
