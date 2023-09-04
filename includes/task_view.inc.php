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

function show_task_desc()
{
    if (isset($_SESSION['employee_list'])) {

        $task_desk = $_SESSION['employee_list'];

        if (!empty($task_desk)) {
            echo '<p></p>';
        } else {
            echo '<p>Empty</p>';
        }
    }
}
