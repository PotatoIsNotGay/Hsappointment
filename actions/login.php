<?php
session_start();

include '../dbconn.php';

$email = $_POST['email'];
$passwordu = $_POST['password'];



try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit(); // Exit script if database connection fails
}

$sql = "SELECT * FROM `users` WHERE email = :email";
$query = $conn->prepare($sql);
$query->bindParam(":email", $email);
$query->execute();

$row = $query->fetch();

// Check if password matches
if (password_verify($passwordu,$row['password'])) {
    // Password matches, successful login
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_id'] = $row['id'];
    header("Location:../offcanvas.php");
    exit(); // Exit script after successful login
} else {
    // Password does not match, set login error and redirect
    $_SESSION['login_error'] = "<div class='alert bg-warning text-center'>Wrong password or email</div>";
    header("Location: ../loginForm.php"); // Redirect back to login form
    exit();
}
