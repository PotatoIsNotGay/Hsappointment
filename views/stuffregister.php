<!DOCTYPE html>
<html>
<head>
<?php
session_start(); // Start the session
if(isset($_SESSION['login_error'])) {
    echo $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
if(isset($_SESSION['login_success'])) {
    echo $_SESSION['login_success'];
    unset($_SESSION['login_success']);
}
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="../css/stuff.css">
</head>
<body>
    <div class="registration-form">
        <form action="../actions/etpinsert.php" method="post">
            <div class="form-icon">
                <span><i class="fa-duotone fa-user-bounty-hunter fa-fade" style="--fa-primary-color: #000807; --fa-secondary-color: #ffffff;"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="gmail" placeholder="Gmail" name="gmail">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="name" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="position" placeholder="Position" name="position">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="admin_name" placeholder="Existed stuff name" name="admin_name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="passworda" placeholder="Existed stuff password" name="passworda">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block create-account" value="Create Account">
            </div>
            <br>
            <a href="adminIndex.php">Back to Dashboard</a>
        </form>
    </body>
</html>
