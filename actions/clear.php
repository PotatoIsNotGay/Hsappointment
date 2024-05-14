<?php

include '../dbconn.php';

// Validate and sanitize input parameter
$id = isset($_POST['id']) ? intval($_POST['id']) : null;

// Check if id is not null
if ($id !== null) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Execute each statement separately
        $stmt1 = $conn->prepare("DELETE FROM appoiments WHERE specialist_id = :id AND accept = 1");
        $stmt1->bindParam(':id', $id);
        $stmt1->execute();

        $stmt2 = $conn->prepare("ALTER TABLE appoiments AUTO_INCREMENT = 1");
        $stmt2->execute();

        // Redirect to the previous page (after successful execution)
        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit(); // Ensure script termination after redirection
        }
    } catch(PDOException $e) {
        // Handle any database errors appropriately
        echo "Database error: " . $e->getMessage();
    }
} else {
    echo "Invalid parameters"; // Handle case where id is missing or not valid
}
