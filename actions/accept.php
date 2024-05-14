<?php

session_start();

$id = $_POST['id'];

include '../dbconn.php';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE appoiments SET accept = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
} catch(PDOException $e) {
    // Handle any database errors appropriately
    echo "Database error: " . $e->getMessage();
}

