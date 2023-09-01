<?php

// type declaration
declare(strict_types=1);

function show_employee_rows()
{
    if (isset($_SESSION['employee_list'])) {

        $employee_list = $_SESSION['employee_list'];

        if (!empty($employee_list)) {
            foreach ($employee_list as $employee) {
                $image_source = 'profile_pics/' . $employee['image_path'];

                echo '<tr>';
                echo '<td class="employees"><img src="' . $image_source . '" alt="Profile Picture">' . $employee['username'] . '</td>';
                echo '<td>' . $employee['hourly_rate'] . '</td>';
                echo '<td>' . ($employee['total_worked_hours'] ?? '0.00') . '</td>';
                echo '<td>' . ($employee['pending_balance'] ?? '0.00') . '</td>';
                echo '<td>' . ($employee['balance'] ?? '0.00') . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td class="employees">' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '</tr>';
        }
    }
}
