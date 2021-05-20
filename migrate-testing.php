<?php

$connection = new PDO('mysql:dbname=test;host=127.0.0.1', 'root', 'password');
$connection->query("use test");

$sql = file_get_contents(__DIR__ . '/agile_test.sql');
$connection->exec($sql);