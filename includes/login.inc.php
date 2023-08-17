<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once 'db-handler.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php?page=home.php");
    die();
}
