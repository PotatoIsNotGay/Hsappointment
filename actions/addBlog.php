<?php
session_start();
include '../dbconn.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $_SESSION['status'] = "<div class='alert alert-danger'>Connection failed: " . $e->getMessage() . "</div>";
    header("Location: ../healthTip.php");
    exit(); // Exit script if database connection fails
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file upload is successful
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['status'] = "<div class='alert alert-danger'>Failed to upload image.</div>";
        header("Location: ../healthTip.php");
        exit(); // Exit script if image upload fails
    }

    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Move uploaded file to destination folder
    $img_upload_path = '../Photos/' . $img_name;
    if (!move_uploaded_file($tmp_name, $img_upload_path)) {
        $_SESSION['status'] = "<div class='alert alert-danger'>Failed to move uploaded file.</div>";
        header("Location: ../healthTip.php");
        exit(); // Exit script if file move fails
    }

    // Prepare and execute SQL statement
    $sql = "INSERT INTO blogs (title, content, image) VALUES (:title, :content, :image)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':image', $img_name);
    if ($stmt->execute()) {
        $_SESSION['status'] = "<div class='alert alert-success'>New blog added successfully!</div>";
        header("Location: ../healthTip.php");
        exit(); // Exit script after redirect
    } else {
        $_SESSION['status'] = "<div class='alert alert-danger'>Failed to insert record into database.</div>";
        header("Location: ../healthTip.php");
        exit(); // Exit script if database insert fails
    }
}
?>
