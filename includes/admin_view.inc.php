<?php

// type declaration
declare(strict_types=1);

function show_role_req_rows()
{
    if (isset($_SESSION['role_req_list'])) {

        $role_req_list = $_SESSION['role_req_list'];

        if (!empty($role_req_list)) {
            foreach ($role_req_list as $role_req) {
                $image_source = 'profile_pics/' . $role_req['image_path'];
                echo '<tr>';
                echo '<td>' . $role_req['user_id'] . '</td>';
                echo '<td class="employees"><img src="' . $image_source . '" alt="Profile Picture">' . $role_req['username'] . '</td>';
                echo '<td>' . $role_req['requested_role'] . '</td>';
                echo '<td>' . ($role_req['requested_date'] ?? '0.00') . '</td>';
                echo '<td><p class="status ' . ($role_req['is_pending'] == 0 ? 'approved' : 'pending') . '">' . ($role_req['is_pending'] == 0 ? 'Approved' : 'Pending') . '</p></td>';
                echo '<td>';
                echo '<div class="action-btn-container">';
                echo '<form action="includes/admin.inc.php" method="post">';
                echo '<input type="hidden" name="user_id" value="' . $role_req['user_id'] . '"/>';
                echo '<input type="hidden" name="requested_role" value="' . $role_req['requested_role'] . '"/>';
                echo '<input type="hidden" name="action" value="approve"/>';
                echo '<button class="action-btn approve-btn" type="submit" name="submitButton"><p>Approve</p></button>';
                echo '</form>';
                echo '<form action="includes/admin.inc.php" method="post">';
                echo '<input type="hidden" name="user_id" value="' . $role_req['user_id'] . '"/>';
                echo '<input type="hidden" name="requested_role" value="' . $role_req['requested_role'] . '"/>';
                echo '<input type="hidden" name="action" value="delete"/>';
                echo '<button class="action-btn delete-btn" type="submit" name="submitButton"><p>Delete</p></button>';
                echo '</form>';
                echo '</td>';
                echo '</div>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td>' . '---' . '</td>';
            echo '<td>' . '---' . '</td>';
            echo '<td>' . '---' . '</td>';
            echo '<td>' . '---' . '</td>';
            echo '<td>' . '---' . '</td>';
            echo '<td>' . '---' . '</td>';
            echo '</tr>';
        }
    }
}

function show_sup_options()
{
    if (isset($_SESSION['sup_list'])) {

        $sup_list = $_SESSION['sup_list'];

        if (!empty($sup_list)) {
            foreach ($sup_list as $sup) {
                echo "<option value='" . $sup['sup_id'] . "'>" . $sup['username'] . "</option>";
            }
        } else {
            echo '<option value="">No Task is Available</option>';
        }
    }
}

function show_emp_options()
{
    if (isset($_SESSION['emp_list'])) {

        $emp_list = $_SESSION['emp_list'];

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
