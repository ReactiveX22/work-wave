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
                echo '<form action="includes/admin.inc.php" method="post">';
                echo '<input type="hidden" name="user_id" value="' . $role_req['user_id'] . '"/>';
                echo '<input type="hidden" name="requested_role" value="' . $role_req['requested_role'] . '"/>';
                echo '<button type="submit" name="submitButton">Approve</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '<td>' . '--' . '</td>';
            echo '</tr>';
        }
    }
}
