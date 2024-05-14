<?php
session_start();

if(isset($_POST['id']) && isset($_POST['myaname']) && isset($_POST['engname'])) {
    include '../dbconn.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to update department details
        $stmt = $conn->prepare("UPDATE specialists SET mya_name = :myaname, name = :engname WHERE id = :id");

        // Bind parameters
        $stmt->bindParam(':myaname', $_POST['myaname']);
        $stmt->bindParam(':engname', $_POST['engname']);
        $stmt->bindParam(':id', $_POST['id']);

        // Execute the update statement
        $stmt->execute();

        // Set session status message
        $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Department details updated successfully.</div>";

        // Redirect back to the department view page
        header("Location:../views/viewDepartment.php");
        exit();
    } catch(PDOException $e) {
        // Set session status message on error
        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Error updating department details: " . $e->getMessage() . "</div>";

        // Redirect back to the department view page
        header("Location:../views/viewDepartment.php");
        exit();
    }
} else {
    // If required parameters are not set, redirect to the department view page
    header("Location:../views/formDepartment.php");
    exit();
}
?>
