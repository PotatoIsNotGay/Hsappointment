<?php
session_start();
include '../dbconn.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve form data
    $specialiststring = $_POST['specialists'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $qualifications = $_POST['qualification'];
    $schedule1 = $_POST['sch1'];
    $schedule2 = $_POST['sch2'];
    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    // Convert specialist name into ID
    $specialistsql = "SELECT id FROM specialists WHERE name = ?";
    $stmt = $conn->prepare($specialistsql);
    $stmt->execute([$specialiststring]); 
    if ($row = $stmt->fetch()) {
        $specialistid = $row['id'];
    } else {
        echo "Can't find specialist ID for given name.";
        exit(); // Exit script if specialist ID not found
    }

    // Convert schedule1 time into ID
    $sch1sql = "SELECT id FROM schedules1 WHERE time = ?";
    $stmt = $conn->prepare($sch1sql);
    $stmt->execute([$schedule1]); 
    if ($row = $stmt->fetch()) {
        $sche1 = $row['id'];
    } else {
        echo "Can't find schedule1 ID for given time: $schedule1";
        exit(); // Exit script if schedule1 ID not found
    }

    // Convert schedule2 time into ID
    $sch2sql = "SELECT id FROM schedules2 WHERE time = ?";
    $stmt = $conn->prepare($sch2sql);
    $stmt->execute([$schedule2]); 
    if ($row = $stmt->fetch()) {
        $sche2 = $row['id'];
    } else {
        echo "Can't find schedule2 ID for given time.";
        exit(); // Exit script if schedule2 ID not found
    }

    // Upload image
    $img_upload_path = '../Photos/'.$img_name;
    if (!move_uploaded_file($tmp_name, $img_upload_path)) {
        echo "Failed to upload image.";
        exit(); // Exit script if image upload fails
    }

    // Prepare and execute SQL to insert doctor data
    $sql = "INSERT INTO doctors (image, name, age, qualification, specialist_id, schedule1_id, schedule2_id)
            VALUES (:image, :name, :age, :qualification, :specialistid, :sche1, :sche2)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':image', $img_name);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':qualification', $qualifications);
    $stmt->bindParam(':specialistid', $specialistid);
    $stmt->bindParam(':sche1', $sche1);
    $stmt->bindParam(':sche2', $sche2);
    $stmt->execute();

    // Set session message for success
    $_SESSION['status'] = '<div class="alert alert-warning text-start" role="alert">
                                New Doctor has been successfully added.
                            </div>';
    
    // Redirect to viewDoc.php
    header("Location:../views/viewDoc.php");
} catch(PDOException $e) {
    // Handle database error
    echo "Error: " . $e->getMessage();
}
?>
