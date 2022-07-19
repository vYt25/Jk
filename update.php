<?php

use app\Users;
use FaaPz\PDO\Clause\Conditional;

require __DIR__ . '/includes/includes.php';


global $database;

$user = new users($database);

if (isset($_POST['updateuser'])) {
    $user->find($_POST['userid']);

    $user->update([
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name']
    ]);
}

if (isset($_POST['updatecompany'])) {

    $user->update([
        'company_name' => $_POST['company_name'],
        'company_phone_number' => $_POST['company_phone_number']
    ], new Conditional('company_name', '=', $_POST['previous_company_name'] ));

    
    header("Location: companies.php");

    exit;
}

if (isset($_POST['deleteuser'])) 
{
    $user->update([
        'deleted_at' => date("Y-m-d H:i:s")
    ], new Conditional('id', '=', $_POST['userid'] ));
}

header("Location: index.php");

exit;

?>
