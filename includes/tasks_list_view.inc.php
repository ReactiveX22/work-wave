<?php

// type declaration
declare(strict_types=1);

function show_emp_tasks_rows()
{
    if (isset($_SESSION['employee_task_list'])) {

        $task_list = $_SESSION['employee_task_list'];

        if (!empty($task_list)) {
            foreach ($task_list as $task) {
                echo '<tr>';
                echo '<td>' . $task['task_name'] . '</td>';
                echo '<td><p class="status ' . ($task['task_status'] == 0 ? 'approved' : 'pending') . '">' . ($task['task_status'] == 0 ? 'Completed' : 'Pending') . '</p></td>';
                echo '<td>' . ($formatted_date = date('M d', strtotime($task['due_date']))) . '</td>';
                echo '<td>';
                echo '<div class="action-btn-container">';
                echo '<form action="includes/manage_task.inc.php" method="post">';
                echo '<input type="hidden" name="task_id" value="' . $task['task_id'] . '"/>';
                echo '<input type="hidden" name="action" value="view"/>';
                echo '<button class="action-btn approve-btn" type="submit" name="submitButton"><p>View</p></button>';
                echo '</form>';
                echo '<form action="includes/manage_task.inc.php" method="post">';
                echo '<input type="hidden" name="action" value="submit-page"/>';
                echo '<button class="action-btn approve-btn" type="submit" name="submitButton"><p>Submit</p></button>';
                echo '</form>';
                echo '</td>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '</tr>';
        }
    }
}

function show_sup_tasks_rows()
{
    if (isset($_SESSION['employee_task_list'])) {

        $task_list = $_SESSION['employee_task_list'];

        if (!empty($task_list)) {
            foreach ($task_list as $task) {
                echo '<tr>';
                echo '<td>' . $task['task_name'] . '</td>';
                echo '<td><p class="status ' . ($task['task_status'] == 0 ? 'approved' : 'pending') . '">' . ($task['task_status'] == 0 ? 'Completed' : 'Pending') . '</p></td>';
                echo '<td><p class="status ' . ($task['done_percentage'] == '100.00%' ? 'approved' : 'pending') . '">' . $task['done_percentage']  . '</p></td>';
                echo '<td>' . ($formatted_date = date('M d', strtotime($task['due_date']))) . '</td>';
                echo '<td>';
                echo '<div class="action-btn-container">';
                echo '<form action="includes/manage_task.inc.php" method="post">';
                echo '<input type="hidden" name="task_id" value="' . $task['task_id'] . '"/>';
                echo '<input type="hidden" name="action" value="view"/>';
                echo '<button class="action-btn approve-btn" type="submit" name="submitButton"><p>View</p></button>';
                echo '</form>';
                echo '<form action="includes/manage_task.inc.php" method="post">';
                echo '<input type="hidden" name="action" value="assign"/>';
                echo '<button class="action-btn approve-btn" type="submit" name="submitButton"><p>Assign</p></button>';
                echo '</form>';
                echo '<form action="includes/manage_task.inc.php" method="post">';
                echo '<input type="hidden" name="task_id" value="' . $task['task_id'] . '"/>';
                echo '<input type="hidden" name="action" value="approve"/>';
                echo '<button class="action-btn approve-btn" type="submit" name="submitButton"><p>Complete</p></button>';
                echo '</form>';
                echo '<form action="includes/manage_task.inc.php" method="post">';
                echo '<input type="hidden" name="task_id" value="' . $task['task_id'] . '"/>';
                echo '<input type="hidden" name="action" value="delete"/>';
                echo '<button class="action-btn delete-btn" type="submit" name="submitButton"><p>Delete</p></button>';
                echo '</form>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '</tr>';
        }
    }
}
