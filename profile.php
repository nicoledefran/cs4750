<html>
    <head>
        <title>PROFILE</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
<body>


    <div class="container mt-5">


    <form action="profile.php" method="POST">
        <h2>Profile</h2>

        <div class="row mt-8">
            <div class="col-md-9">
                <h3>Name:</h3>
                <p><?php echo $user['first_name'] . " " . $user['last_name'];?></p>

                <h3>Email:</h3>
                <p><?php echo $user['email_address'];?></p>

            </div>
        </div>

    </div>

</body>
</html>

<!-- 
<?php

if (session_status() == PHP_SESSION_NONE) { 
    session_start(); 
}

require("connect-db.php");
require("utils.php");

$user = getUserInfo($_SESSION['email']);
$user = $user[0];
?>

<head>
    <title>Profile Page</title>
</head>
<body>
    <h3>Name: <?php echo $user['first_name'] . " " . $user['last_name'];?></h3>
    <h3>Email: <?php echo $user['email_address'];?></h3>
</body>
        -->
