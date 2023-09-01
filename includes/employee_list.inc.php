<?php
require_once 'employee_list_contr.inc.php';

try {
    require_once 'db-handler.php';
    require_once 'employee_list_model.inc.php';
    require_once 'config_session.inc.php';

    $supervisor_id = $_SESSION['user_data']['user_id'];

    $_SESSION['employee_list'] = $employee_list = get_employee_list($pdo, $supervisor_id);
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
