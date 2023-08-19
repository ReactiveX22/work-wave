<?php

// type declaration
declare(strict_types=1);

function get_total_work_sessions(object $pdo, $employee_id)
{
    $query = "SELECT employee_id, SUM(worked_hours) AS total_worked_hours FROM work_sessions WHERE employee_id = :employee_id GROUP BY employee_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":employee_id", $employee_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
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

function get_days_and_worked_hours_arrays(object $pdo, $employee_id)
{
    $query = "SELECT DATE(end_timestamp) AS day, SUM(worked_hours) AS total_worked_hours
          FROM work_sessions
          WHERE employee_id = :employee_id AND end_timestamp >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
          GROUP BY day";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":employee_id", $employee_id);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $days = array();
    $workedHours = array();

    foreach ($results as $row) {
        $day = date('M d', strtotime($row['day']));
        $totalWorkedHours = $row['total_worked_hours'];
        $days[] = $day;
        $workedHours[] = $totalWorkedHours;
    }

    return json_encode(array($days, $workedHours));
}
