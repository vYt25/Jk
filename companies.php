<?php

use app\users;

require __DIR__ . '/includes/includes.php';

global $database;

$usersclass = new users($database);
$allusers = $usersclass->loadall();

$companies = [];

foreach ($allusers->get() as $user) {
    if (isset($companies[$user['company_name']])) {
        $companies[$user['company_name']] = [
            'company_name' => $user['company_name'],
            'company_phone_number' => $user['company_phone_number'],
                'user_count' => $companies[$user['company_name']]['user_count'] + 1
                ];
    } else {
        $companies[$user['company_name']] = [
            'company_name' => $user['company_name'],
            'company_phone_number' => $user['company_phone_number'], 'user_count' => 1
        ];
    }
}
?>

<ul>
    <li><a href="index.php">Users</a></li>
    <li><a href="companies.php">companies</a></li>
</ul>

<table>
    <thead>
    <tr>
        <td>Company name</td>
        <td>Phone Number</td>
        <td>Total Users</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($companies as $user) {
    ?>

    <tr>
        <form action="update.php" method="POST">
            <td>
                <input type="text" name="company_name" value="<?= $user['company_name']; ?>" />
            </td>
            <td>
                <input type="text" name="company_phone_number" value="<?= $user['company_phone_number']; ?>" />
            </td>
            <td><?= $user['user_count']; ?></td>
            <td>
                <input type="hidden" name="previous_company_name" value="<?= $user['company_name']; ?>" />
                <input type="submit" name="updatecompany" value="Save changes" />
            </td>
        </form>
    </tr>

    <?php
    }
    ?>
    </tbody>
</table>
