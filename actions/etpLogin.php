<?php
session_start();

include '../dbconn.php';

$name = $_POST['username'];
$email = $_POST['email'];
$passwordu = $_POST['password'];


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit(); // Exit script if database connection fails
}

$sql = "SELECT * FROM `admins` WHERE gmail = :email AND name = :name";
$query = $conn->prepare($sql);
$query->bindParam(":email", $email);
$query->bindParam(":name", $name);
$query->execute();

$row = $query->fetch();

// Check if password matches
if (password_verify($passwordu,$row['password'])) {
    // Password matches, successful login
    $_SESSION['admin_name'] = $row['name'];
    $_SESSION['admin_position'] = $row['position'];
    header("Location:../views/adminIndex.php");
    exit(); // Exit script after successful login
} else {
    // Password does not match, set login error and redirect
    $_SESSION['login_error'] = '<div style="background-color: #ffc107; text-align: center;" class="alert">Wrong password or email</div>
    ';
    header("Location: ../views/etpForm.php"); // Redirect back to login form
    exit();
}
