<?php

use app\Users;

require __DIR__ . '/includes/includes.php';

global $database;

$usersClass = new Users($database);
$allUsers = $usersClass->loadAll();
$companies = $allUsers->getCompanies();

$user = new Users($database);

function getCompanyName()
{
    return strtolower($_POST['company_name']) == 'others' ?
        $_POST['new_company_name'] :
        $_POST['company_name'];
}

function getCompanyPhoneNumner($companies)
{
    return strtolower($_POST['company_name']) == 'others' ?
        $_POST['company_phone_number'] :
        $companies[$_POST['company_name']]['company_phone_number'];
}

$user->create(
    $_POST['first_name'], 
    $_POST['last_name'],
    getCompanyName(),
    getCompanyPhoneNumner($companies)
);

header("Location: index.php");

?>
