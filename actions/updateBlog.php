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
        $_SESSION['status'] = "<div class='alert alert-danger text-start' role='alert'>Connection failed: " . $e->getMessage() . "</div>";
        header("Location: ../healthTip.php");
        exit(); // Stop execution if database connection fails
    }

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Escape user inputs for security
        $title = $conn->quote($_POST['title']);
        $content = $conn->quote($_POST['content']);
        $id = $_POST['id'];

        try {
            // Update blog in the database
            $stmt = $conn->prepare("UPDATE blogs SET title = $title, content = $content WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Set session status message
            $_SESSION['status'] = "<div class='alert alert-success text-start' role='alert'>Blog updated successfully!</div>";

            // Redirect back to the healthTip.php page
            header("Location: ../healthTip.php");
            exit();
        } catch(PDOException $e) {
            // Set session status message on error
            $_SESSION['status'] = "<div class='alert alert-danger text-start' role='alert'>Error updating blog: " . $e->getMessage() . "</div>";

            // Redirect back to the healthTip.php page
            header("Location: ../healthTip.php");
            exit();
        }
    } else {
        // Redirect back to the healthTip.php page if form was not submitted
        header("Location: ../healthTip.php");
        exit();
    }
} else {
    // Redirect to login page if admin is not logged in
    header("Location:../views/etpForm.php");
    exit();
}
?>
