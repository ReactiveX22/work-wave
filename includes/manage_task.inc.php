<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $task_id = $_POST["task_id"];
    $action = $_POST["action"];

    try {
        require_once 'db-handler.php';
        require_once 'task_model.inc.php';
        require_once 'config_session.inc.php';

        $user_id = $_SESSION['user_data']['user_id'];

        // error handlers
        $errors = [];


        if ($action === 'approve') {
            set_task_0($pdo, $task_id);
        } elseif ($action === 'delete') {
            delete_task($pdo, $task_id);
        } elseif ($action === 'view') {
            $_SESSION["view_task_id"] = $task_id;
            $_SESSION["view_task_name"] = get_task_name($pdo, $task_id);
            $_SESSION["view_task_desc"] = get_task_desc($pdo, $task_id);
            $_SESSION["view_task_list"] = get_task_assigned_to_list($pdo, $task_id, $user_id);

            header("Location: ../index.php?page=view_task");
            die();
        } elseif ($action === 'download') {
            $file_name = $_POST["file_path"];
            $file = '../uploaded_files/' . $file_name;

            if (file_exists($file) && !empty($file_name)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachtment; filename="' . basename($file) . '"');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));

                ob_clean();
                flush();
                readfile($file);
                exit;

                // header("Location: ../index.php?page=tasks");
            }
        } elseif ($action === 'submit-page') {
            header("Location: ../index.php?page=submit_task");
            die();
        } elseif ($action === 'assign') {
            header("Location: ../index.php?page=assign_task");
            die();
        }

        if ($errors) {
        }

        header("Location: ../index.php?page=tasks");
        die();

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
}
