<?php
session_start();

include '../dbconn.php';

$name = $_POST['name'];
$gmail = $_POST['gmail'];
$passwordu = $_POST['password'];
$passworda = $_POST['passworda'];
$position = $_POST['position'];
$addname = $_SESSION['admin_name'];

// Establish database connection
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit(); // Exit script if database connection fails
}

// Hash the user's password
$passwordu = password_hash($passwordu, PASSWORD_DEFAULT);

// Prepare and execute SELECT query
$sql = "SELECT * FROM `admins` WHERE name = :addname";
$query = $conn->prepare($sql);
$query->bindParam(":addname", $addname);
$query->execute();

$row = $query->fetch();

// Check if password matches
if (password_verify($passworda, $row['password'])) {
    // Password matches, successful login
    // Prepare and execute INSERT query
    $sql = "INSERT INTO `admins`(`gmail`, `name`, `password`, `position`) VALUES (:gmail, :name, :passwordu, :position)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":gmail", $gmail);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":passwordu", $passwordu);
    $stmt->bindParam(":position", $position);
    $stmt->execute();

    $_SESSION['login_success'] = "<div class='alert bg-warning text-center'>Success</div>";
    header("Location: ../views/stuffregister.php?success");
    exit(); // Exit script after successful registration
} else {
    // Password does not match or user does not exist
    $_SESSION['login_error'] = "<div class='alert bg-warning text-center'>Wrong password or email</div>";
    header("Location: ../views/stuffregister.php?error"); // Redirect back to registration form
    exit();
}
?>
