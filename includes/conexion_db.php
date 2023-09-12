<?php
require_once("env.php");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error($conn));
    return false;
}

$db_select = mysqli_select_db($conn, DB_NAME);
if (!$db_select) {
    error_log("Database selection failed: " . mysqli_error($conn));
    return false;
}

?>