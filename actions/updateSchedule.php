<?php
session_start();

include '../dbconn.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Validate the $id (optional for enhanced security)
    $id = $_POST['id'];
    if (!is_numeric($id) || $id <= 0) {
        die("Invalid id");
    }

    $time = $_POST['time']; 
    $table = $_GET['sch'];

    // Prepare the SQL statement using placeholders to prevent SQL injection
    $sql = "UPDATE `$table` SET `time` = :time WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':time', $time);

    // Execute the update
    $stmt->execute();

    // Set session message
    $_SESSION['status'] = '<div class="alert alert-warning" role="alert">Schedule was updated!</div>';

    // Redirect to viewDoc.php
    header("Location:../views/viewSchedule.php");
    exit(); // Always call exit after a header redirect
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
