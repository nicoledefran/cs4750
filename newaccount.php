<?php

if (session_status() == PHP_SESSION_NONE) { session_start(); }

require "connect-db.php";
require "utils.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $users = getAllUsernames();
    if(!in_array($_POST['email'],$users)){
        createUser($_POST['email'],$_POST['firstName'],$_POST['lastName'],$_POST['password']);
        header("Location: login.html");
    }
    else{
        echo "Username Already Exists!";
    }
}
?>
<html>
    <head>
        <title>New Account</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    </head>
<body>
    <form action="newaccount.php" method="POST">
    <div class="mb-3">
        <input type="text" name="uname" placeholder="Email" required><br>
    </div>
    <div class="mb-3">
        <input type="password" name="password" placeholder="Password" required><br>
    </div>
    <div class="mb-3">
        <input type="text" name="first_name" placeholder="First Name" required><br>
    </div>
    <div class="mb-3">
        <input type="text" name="last_name" placeholder="Last Name" required><br>
    </div>
    </div>
        <button type="submit" class="btn btn-primary">Create Account</button>
    </form>
    <a href="login.html">Back To Login</a>
</body>
</html>