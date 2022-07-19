<?php

use app\users;

require __DIR__ . '/includes/includes.php';

global $database;

$usersClass = new Users($database);
$allUsers = $usersClass->loadAll();
$companies = $allUsers->getCompanies();

?>

<ul>
    <li><a href="index.php">Users</a></li>
    <li><a href="companies.php">companies</a></li>
</ul>

<table>
    <thead>
    <tr>
        <td>Date</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Company Name</td>
        <td>Phone Number</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($allUsers->get() as $user) {
        if($user['deleted_at'] == null)
        {
    ?>

    <tr>
        <form action="update.php" method="POST">
            <td>
                <?= date('d-m-Y', strtotime($user['created_at'])); ?>
            </td>
            <td>
                <input type="text" name="first_name" value="<?= $user['first_name']; ?>" />
            </td>
            <td>
                <input type="text" name="last_name" value="<?= $user['last_name']; ?>" />
            </td>        
            <td>
                <?= $user['company_name']; ?>
            </td>
            <td>
                <?= $user['company_phone_number']; ?>
            </td>
            <td>
                
                <input type="submit" name="updateuser" value="Save changes" />
                <input type="hidden" name="userid" value="<?= $user['id']; ?>" />
                <input type="submit" name="deleteuser" value="Delete User" />
            </td>
        </form>
    </tr>

    <?php
        }
    }
    ?>
    </tbody>
</table>


<h3>Create a user</h3>
<form action="create.php" METHOD="POST">
    Name: <input type="text" name="first_name" required/>
    Last Name: <input type="text" name="last_name" required/>
    Company: 
        <select name="company_name">
        <?php
        foreach($companies as $company)
        {
            echo "<option value='$company[company_name]'>$company[company_name]</option>";
        }
        echo "<option value='Others'>Others</option>";
        ?>
        </select>
        <input type="text" name="new_company_name" placeholder="New Company Name"/>
    Company Phone Number: <input type="text" name="company_phone_number" placeholder="Fill-up if Others"/>
    <input type="submit" value="Create" />
</form>
