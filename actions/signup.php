<?php
session_start(); // Start the session

$name = $_POST['name'];
$email = $_POST['email'];
$passwordu = $_POST['password'];

include '../dbconn.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Exit script if database connection fails
}

$passwordu = password_hash($passwordu, PASSWORD_DEFAULT);

// Prepare the SQL statement with placeholders for insertion
$insert_sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name, :email, :password)";
$insert_query = $conn->prepare($insert_sql);

// Bind parameters to the prepared statement for insertion
$insert_query->bindParam(':name', $name);
$insert_query->bindParam(':email', $email);
$insert_query->bindParam(':password', $passwordu);

// Execute the prepared statement for insertion
$insert_query->execute();

// Prepare the SQL statement with placeholders for selection
$select_sql = "SELECT * FROM `users` WHERE email = :email";
$select_query = $conn->prepare($select_sql);
$select_query->bindParam(':email', $email);

// Execute the prepared statement for selection
$select_query->execute();

$row = $select_query->fetch();

$_SESSION['user_name'] = $row['name'];
$_SESSION['user_id'] = $row['id'];

header("Location: ../offcanvas.php");
exit(); // Always exit after header redirection
?>
