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

function show_worked_hours()
{
    if (isset($_SESSION["employee_total_worked_hours"])) {

        $total_worked_hours = $_SESSION["employee_total_worked_hours"];

        echo '<p class="amount_num">' . $total_worked_hours . '</p>';
    }
}

function show_balance()
{
    if (isset($_SESSION["employee_balance"])) {

        $balance = $_SESSION["employee_balance"];

        echo '<p class="amount_num">' . number_format((float)$balance, 2, ".", ",") . '</p>';
    }
}
