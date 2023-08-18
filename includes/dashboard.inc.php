<?php
require_once 'dashboard_contr.inc.php';

try {
    require_once 'db-handler.php';
    require_once 'dashboard_model.inc.php';
    require_once 'dashboard_view.inc.php';

    require_once 'config_session.inc.php';

    $employee_id = $_SESSION['user_data']['employee_id'];

    $work_sessions = get_work_sessions($pdo, $employee_id);
    $balance = get_balance($pdo, $employee_id);

    $_SESSION["employee_total_worked_hours"] = $work_sessions["total_worked_hours"];
    $_SESSION["employee_balance"] = $balance["balance"];

    $json_data = json_encode($work_sessions);
    echo "<script>let data = JSON.parse('$json_data');</script>";
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
