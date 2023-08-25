<?php
require_once 'dashboard_contr.inc.php';

try {
    // require_once 'db-handler.php';
    // require_once 'dashboard_model.inc.php';
    // require_once 'dashboard_view.inc.php';

    require_once 'config_session.inc.php';

    $employee_id = $_SESSION['user_data']['employee_id'];

    $profile_pic = $_SESSION["employee_profile_pic"];
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
