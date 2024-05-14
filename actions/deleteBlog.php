<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['admin_name'])) {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hsappointment";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if blog ID is provided in the URL
    if (isset($_GET['id'])) {
        $blog_id = $_GET['id'];

        // Prepare a delete statement
        $stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
        $stmt->bind_param("i", $blog_id);

        // Execute the delete statement
        if ($stmt->execute()) {
            // Set session status message
            $_SESSION['status'] = "<div class='alert alert-success'>Blog deleted successfully!</div>";
        } else {
            // Set session status message on failure
            $_SESSION['status'] = "<div class='alert alert-danger'>Error deleting blog: " . $conn->error . "</div>";
        }

        // Close prepared statement
        $stmt->close();
    }

    // Close database connection
    $conn->close();

    // Redirect back to the page where you came from
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
} else {
    // Redirect if user is not logged in
    header("Location: ../views/etpForm.php");
    exit();
}
?>
