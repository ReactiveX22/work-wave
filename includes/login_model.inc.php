<?php

// type declaration
declare(strict_types=1);

function get_user(object $pdo, string $username)
{
  $query = "SELECT * FROM users WHERE username = :username;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":username", $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function get_user_role_name(object $pdo, $user_id)
{
  $query = "SELECT role_name FROM (SELECT
  ur.user_id AS user_id,
  u.username AS username,
  ur.role_id AS role_id,
  r.role_name AS role_name
FROM
  user_roles ur
  JOIN users u ON ur.user_id = u.user_id
  JOIN roles r ON ur.role_id = r.role_id) AS subquery WHERE user_id = :user_id ;";

  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":user_id", $user_id);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result["role_name"];
}

function get_user_role_id(object $pdo, $user_id)
{
  $query = "SELECT role_id FROM (SELECT
  ur.user_id AS user_id,
  u.username AS username,
  ur.role_id AS role_id,
  r.role_name AS role_name
FROM
  user_roles ur
  JOIN users u ON ur.user_id = u.user_id
  JOIN roles r ON ur.role_id = r.role_id) AS subquery WHERE user_id = :user_id ;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":user_id", $user_id);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result["role_id"];
}

function get_user_pending_role_id(object $pdo, $user_id)
{
  $query = "SELECT requested_role FROM (SELECT prr.user_id, u.username, u.image_path, prr.requested_role, prr.requested_date, prr.is_pending FROM pending_role_reqs prr JOIN users u ON prr.user_id = u.user_id) AS subquery WHERE user_id = :user_id;";

  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":user_id", $user_id);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['requested_role'];
}

function get_role_name(object $pdo, $role_id)
{
  $query = "SELECT role_name FROM roles WHERE role_id = :role_id;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":role_id", $role_id);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result["role_name"];
}
