<?php

// type declaration
declare(strict_types=1);

function show_pay_req_rows()
{
    if (isset($_SESSION['pay_req_list'])) {

        $pay_req_list = $_SESSION['pay_req_list'];

        if (!empty($pay_req_list)) {
            foreach ($pay_req_list as $pay_req) {
                $image_source = 'profile_pics/' . $pay_req['image_path'];
                echo '<tr>';
                echo '<td class="employees"><img src="' . $image_source . '" alt="Profile Picture">' . $pay_req['username'] . '</td>';
                echo '<td>' . $pay_req['pending_amount'] . '</td>';
                echo '<td><p class="status ' . ($pay_req['is_pending'] == 0 ? 'approved' : 'pending') . '">' . ($pay_req['is_pending'] == 0 ? 'Approved' : 'Pending') . '</p></td>';
                echo '<td>';
                echo '<div class="action-btn-container">';
                echo '<form action="includes/manage_payments.inc.php" method="post">';
                echo '<input type="hidden" name="user_id" value="' . $pay_req['user_id'] . '"/>';
                echo '<input type="hidden" name="pending_amount" value="' . $pay_req['pending_amount'] . '"/>';
                echo '<input type="hidden" name="action" value="approve"/>';
                echo '<button class="action-btn approve-btn" type="submit" name="submitButton"><p>Approve</p></button>';
                echo '</form>';
                echo '<form action="includes/manage_payments.inc.php" method="post">';
                echo '<input type="hidden" name="user_id" value="' . $pay_req['user_id'] . '"/>';
                echo '<input type="hidden" name="pending_amount" value="' . $pay_req['pending_amount'] . '"/>';
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
            echo '</tr>';
        }
    }
}
