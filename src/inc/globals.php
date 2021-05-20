<?php

$alertMsg = '';
$conn = mysqli_connect(DB_HOSTT, DB_USER, DB_PASS, DB_NAME);

$loggedInUser = null;

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];
}
