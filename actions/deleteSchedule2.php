<?php
session_start();

// Include database connection
include '../dbconn.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
};

// Check if admin is logged in
if (!isset($_SESSION['admin_name'])) {
    header("Location: ../views/etpForm.php");
    exit();
}

// Check if ID is set and not empty
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    try {
        // Prepare SQL statement to delete schedule entry by ID
        $stmt = $conn->prepare("DELETE FROM schedules2 WHERE id = :id");
        $stmt->bindParam(':id', $id);
        
        // Execute the statement
        $stmt->execute();

        // Set session variable to indicate successful deletion
        $_SESSION['delete_success'] = true;

        // Redirect back to view schedule page
        header("Location: ../views/viewSchedule.php");
        exit();
    } catch(PDOException $e) {
        // Handle any errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // If ID is not set or empty, redirect back to view schedule page
    header("Location: viewSchedule.php");
    exit();
}
?>
