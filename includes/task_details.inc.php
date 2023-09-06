<?php

try {
    require_once 'db-handler.php';
    require_once 'task_model.inc.php';
    require_once 'config_session.inc.php';


    $view_task_id = $_SESSION["view_task_id"];

    $_SESSION["view_task_name"] = get_task_name($pdo, $view_task_id);
    $_SESSION["view_task_desc"] = get_task_desc($pdo, $view_task_id);

    $pdo = null;
    $stmt = null;
    die();
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
