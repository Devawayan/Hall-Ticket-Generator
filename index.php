<?php
session_start();
include('data.php');
include("functions.php");
$user_data = check_login($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Hall_Ticket</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>This is the index page</h1>
    <br>
    hello, username
</body>
</html>