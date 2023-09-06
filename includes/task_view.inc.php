<?php

// type declaration
declare(strict_types=1);

function show_task_options()
{
    if (isset($_SESSION['employee_task_list'])) {

        $task_list = $_SESSION['employee_task_list'];

        if (!empty($task_list)) {
            foreach ($task_list as $task) {
                echo "<option value='" . $task['task_id'] . "'>" . $task['task_name'] . "</option>";
            }
        } else {
            echo '<option value="">No Task is Available</option>';
        }
    }
}

function show_emps_options()
{
    if (isset($_SESSION['employee_list'])) {

        $emp_list = $_SESSION['employee_list'];

        if (!empty($emp_list)) {
            foreach ($emp_list as $emp) {
                // echo '<option value="">Employee</option>';
                echo "<option value='" . $emp['emp_id'] . "'>" . $emp['username'] . "</option>";
            }
        } else {
            echo '<option value="">No Employee is Available</option>';
        }
    }
}

function show_task_name()
{
    if (isset($_SESSION['view_task_name'])) {

        $task_name = $_SESSION['view_task_name'];

        if (!empty($task_name)) {
            echo  $task_name;
        } else {
            echo '<p>Empty</p>';
        }
    }
}

function show_task_desc()
{
    if (isset($_SESSION['view_task_desc'])) {

        $task_desc = $_SESSION['view_task_desc'];

        if (!empty($task_desc)) {
            echo  $task_desc;
        } else {
            echo '<p>Empty</p>';
        }
    }
}

function show_task_assigned_to()
{
    if (isset($_SESSION['view_task_list'])) {

        $task_assigned_to_list = $_SESSION['view_task_list'];

        if (!empty($task_assigned_to_list)) {
            foreach ($task_assigned_to_list as $task) {
                $image_source = 'profile_pics/' . $task['image_path'];

                echo "<tr>";
                echo '<td class="employees"><img src="' . $image_source . '" alt="Profile Picture">' . $task['username'] . '</td>';
                echo "<td>" . $task['has_file'] . "</td>";
                echo '<td>';
                echo '<div class="action-btn-container">';
                echo '<form action="includes/manage_task.inc.php" method="post">';
                echo '<input type="hidden" name="file_path" value="' . $task['file_path'] . '"/>';
                echo '<input type="hidden" name="action" value="download"/>';
                echo '<button class="action-btn approve-btn" type="submit" name="submitButton"><p>Download</p></button>';
                echo '</form>';
                echo '</div>';
                echo '</td>';
                echo "</tr>";
            }
        } else {
            echo '<tr>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '</tr>';
        }
    } else {
        echo "No tasks to view.";
    }
}
