<?php
session_start();

if(isset($_GET['id'])) {
    include '../dbconn.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Begin a transaction
        $conn->beginTransaction();

        // Delete doctors associated with the department
        $stmt = $conn->prepare("DELETE FROM doctors WHERE specialist_id = :id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();

        // Delete the department itself
        $stmt = $conn->prepare("DELETE FROM specialists WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();

        // Commit the transaction
        $conn->commit();

        // Set session status message
        $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Department deleted successfully.</div>";

        // Redirect back to the department view page
        header("Location:../views/viewDepartment.php");
        exit();
    } catch(PDOException $e) {
        // Rollback the transaction and set error message
        $conn->rollback();
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Error deleting department: " . $e->getMessage() . "</div>";

        // Redirect back to the department view page
        header("Location:../views/viewDepartment.php");
        exit();
    }
} else {
    // If required parameters are not set, redirect to the department view page
    header("Location:../views/viewDepartment.php");
    exit();
}
?>
