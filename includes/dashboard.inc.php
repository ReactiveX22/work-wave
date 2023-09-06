<?php
require_once 'dashboard_contr.inc.php';

try {
    require_once 'db-handler.php';
    require_once 'dashboard_model.inc.php';
    require_once 'dashboard_view.inc.php';

    require_once 'config_session.inc.php';

    $employee_id = $_SESSION['user_data']['user_id'];

    $work_sessions = get_work_sessions($pdo, $employee_id);

    $worked_hours = get_worked_hours_array($pdo, $employee_id);

    $_SESSION["emp_total_tasks_done"] = get_emp_total_task_done($pdo, $employee_id);
    $_SESSION["emp_pending_tasks"] = get_emp_pending_tasks($pdo, $employee_id);
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
