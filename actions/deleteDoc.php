<?php
session_start();

// Check if admin is logged in
if(isset($_SESSION['admin_name'])){
    include '../dbconn.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit(); // Stop execution if database connection fails
    }

    // Check if the doctor ID is provided in the POST request
    if(isset($_POST['id'])) {
        $doctor_id = $_POST['id'];

        try {
            // Prepare SQL statement to delete the doctor from the database
            $stmt = $conn->prepare("DELETE FROM doctors WHERE id = :id");
            $stmt->bindParam(':id', $doctor_id);
            $stmt->execute();

            // Set session status message
            $_SESSION['status'] = "<div class='alert alert-success text-start' role='alert'>Doctor deleted successfully!</div>";

            // Redirect back to the viewDoc.php page
            header("Location: ../views/viewDoc.php");
            exit();
        } catch(PDOException $e) {
            // Set session status message on error
            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>Error deleting doctor: " . $e->getMessage() . "</div>";

            // Redirect back to the viewDoc.php page
            header("Location: ../views/viewDoc.php");
            exit();
        }
    } else {
        // Redirect back to the viewDoc.php page if doctor ID is not provided
        header("Location: ../views/viewDoc.php");
        exit();
    }
} else {
    // Redirect to login page if admin is not logged in
    header("Location:../views/etpForm.php");
    exit();
}
?>
