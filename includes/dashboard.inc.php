<?php
require_once 'dashboard_contr.inc.php';

try {
    require_once 'db-handler.php';
    require_once 'dashboard_model.inc.php';
    require_once 'dashboard_view.inc.php';

    require_once 'config_session.inc.php';

    $employee_id = $_SESSION['user_data']['user_id'];

    $total_worked_hours = get_total_worked_hours($pdo, $employee_id);
    $balance = get_balance($pdo, $employee_id);
    $employee_pending_balance = get_user_total_pending_balance($pdo, $employee_id);

    $_SESSION["employee_total_worked_hours"] = isset($total_worked_hours) ? $total_worked_hours : 0;
    $_SESSION["employee_balance"] = isset($balance) ? $balance : 0;
    $_SESSION["employee_pending_balance"] = isset($employee_pending_balance) ? $employee_pending_balance : 0;


    $work_sessions = get_work_sessions($pdo, $employee_id);

    $worked_hours = get_worked_hours_array($pdo, $employee_id);
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
