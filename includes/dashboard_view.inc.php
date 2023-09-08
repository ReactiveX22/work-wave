<?php
// type declaration
declare(strict_types=1);

function show_hourly_rate()
{
    if (isset($_SESSION["user_hourly_rate"])) {

        $hourly_rate = $_SESSION["user_hourly_rate"];

        echo '<p class="amount_num">' . $hourly_rate . '</p>';
    }
}

function show_username()
{
    if (isset($_SESSION["user_username"])) {

        $username = $_SESSION["user_username"];

        echo '<p>' . $username . '</p>';
    }
}

function show_completed_tasks()
{
    if (isset($_SESSION["emp_total_tasks_done"])) {

        $employee_total_tasks_done = $_SESSION["emp_total_tasks_done"];

        echo '<p class="amount_num">' . $employee_total_tasks_done . '</p>';
    } else {
        echo '<p class="amount_num">0</p>';
    }
}

function show_incomplete_tasks()
{
    if (isset($_SESSION["emp_pending_tasks"])) {

        $emp_pending_tasks = $_SESSION["emp_pending_tasks"];

        echo '<p class="amount_num">' . $emp_pending_tasks . '</p>';
    } else {
        echo '<p class="amount_num">0</p>';
    }
}

function show_submitted_tasks()
{
    if (isset($_SESSION["emp_submitted_tasks"])) {
        $emp_submitted_tasks = $_SESSION["emp_submitted_tasks"];
        echo '<p class="amount_num">' . $emp_submitted_tasks . '</p>';
    } else {
        echo '<p class="amount_num">0</p>';
    }
}
function show_balance()
{
    if (isset($_SESSION["employee_balance"])) {

        $balance = $_SESSION["employee_balance"];

        echo '<p class="amount_num">' . number_format((float)$balance, 2, ".", ",") . '</p>';
    }
}

function show_pending_balance()
{
    if (isset($_SESSION["employee_pending_balance"])) {

        $pending_balance = $_SESSION["employee_pending_balance"];

        echo '<p class="amount_num">' . number_format((float)$pending_balance, 2, ".", ",") . '</p>';
    }
}
