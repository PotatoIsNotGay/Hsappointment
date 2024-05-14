<?php
session_start();
include '../dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary form data is set
    if (isset($_POST['time'])) {
        $time = $_POST['time'];

        try {
            // Establish database connection
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL statement to insert schedule into schedules1 table
            $stmt = $conn->prepare("INSERT INTO schedules2 (time) VALUES (:time)");
            $stmt->bindParam(':time', $time);

            // Execute the SQL statement
            $stmt->execute();

            // Set session message for successful addition
            $_SESSION['status'] = '<div class="alert alert-success" role="alert">Schedule added successfully to Schedule 2!</div>';
        } catch (PDOException $e) {
            // Set session message for the error
            $_SESSION['status'] = '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . '</div>';
        }

        // Redirect back to the addSchForm page
        header("Location: ../views/viewSchedule.php");
        exit();
    } else {
        // Set session message for invalid form submission
        $_SESSION['status'] = '<div class="alert alert-danger" role="alert">Invalid form submission!</div>';
        header("Location: ../views/viewSchedule.php");
        exit();
    }
} else {
    // Redirect to an error page if accessed through invalid method
    header("Location: ../error.php");
    exit();
}
?>
