<?php

use FaaPz\PDO\Database;


$dsn = 'mysql:host=' . $_ENV['MYSQL_HOST'] . ':' . $_ENV['MYSQL_PORT'] . ';dbname=' . $_ENV['MYSQL_DATABASE'] . ';charset=utf8';

$database = new Database($dsn, $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASS']);
