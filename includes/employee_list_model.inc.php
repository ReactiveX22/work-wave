<?php

// type declaration
declare(strict_types=1);

function get_employee_list(object $pdo, $sup_id)
{
    $query = "SELECT * FROM sup_emp_list_view WHERE sup_id = :sup_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":sup_id", $sup_id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return 0;
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
