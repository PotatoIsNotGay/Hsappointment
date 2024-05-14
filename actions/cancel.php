<?php

session_start();

// db connect
include '../dbconn.php';

// Validate and sanitize input parameters
$id = isset($_POST['id']) ? intval($_POST['id']) : null;
$table = isset($_POST['table']) ? $_POST['table'] : null;

// Validate if id and table are not null
if ($id !== null && $table !== null) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM $table WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit(); // Ensure script termination after redirection
        }
    } catch(PDOException $e) {
        // Handle any database errors appropriately
        echo "Database error: " . $e->getMessage();
    }
} else {
    echo "Invalid parameters"; // Handle case where id or table is missing
}