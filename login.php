<?php

session_start();

require "connect-db.php";
require "utils.php";
$_error = " ";

if (isset($_SESSION['error'])) {
    echo '<p>' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']); // Clear the error message after displaying it
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    var_dump($_POST); // Check what is received
    if(!empty($_POST['actionBtn'])&&($_POST['actionBtn']=="Login")){
        print_r("bye");
        $user = checkUser($_POST['email'], $_POST['password']);
        print_r($user);
    if ($user == true){
        $_SESSION['email'] = $_POST['email']; // session id is email, save session
        header("Location: feed.php");  // once logged in direct to the feed
        exit;
    }
    else {
        $_SESSION['error'] = "Email and password are incorrect.";
        header("Location: login.php");  // Redirect back to login page to display error
        exit;
    }    
}
}
?>

<html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
<body>
    <form action="login.php" method="post">
        <h2>Log in to SongSphere!</h2>
    <div class="mb-3">
        <input type="text" name="email" id = "email" class="form-control" placeholder="Email" required><br>
    </div>

    <div class="mb-3">
        <input type="password" name="password" id = "password" class="form-control" placeholder="Password" required><br>
    </div>
        <button class="btn btn-primary" type="submit" value="Login" name="actionBtn">Login</button>
    </form>
    <a href="newaccount.php">Create Account</a>
</body>
</html>