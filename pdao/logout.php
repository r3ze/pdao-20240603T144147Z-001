<?php
include "config.php";

session_start();
session_destroy();

$fetch_accountid = $_SESSION['account_id'];
mysqli_query($con, "INSERT INTO history_log (account_id, activity) VALUES ('$fetch_accountid', 'Logout')");
header('location: index.php');


?>