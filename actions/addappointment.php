<?php
session_start();
include '../dbconn.php';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    error_log("Connection failed: " . $e->getMessage(), 0); // Log error
    $_SESSION['status'] = '<div class="alert alert-danger" role="alert">Error: Database connection failed.</div>';
    header("Location: ../offcanvas.php");
    exit();
}

$docid = $_POST['id'];
$specialistid = $_POST['specialistid'];
$phnumber = $_POST['phno'];
$patientname = $_POST['patientname'];
$schedule = $_POST['schedule'];
$username = $_SESSION['user_name'];
$userid = $_SESSION['user_id'];

try {
    $appsql = "INSERT INTO `appoiments`(`user_id`,`patient_name`, `doctor_id`, `specialist_id`, `schedule`, `phone_number`) VALUES (:userid,:patientname, :docid, :specialistid, :schedule, :phnumber)";
    $query = $conn->prepare($appsql);
    $query->bindParam(':userid', $userid);
    $query->bindParam(':docid', $docid);
    $query->bindParam(':patientname', $patientname);
    $query->bindParam(':specialistid', $specialistid);
    $query->bindParam(':schedule', $schedule);
    $query->bindParam(':phnumber', $phnumber);
    $query->execute();

    $_SESSION['status'] = '<div class="alert alert-success" role="alert">Appointment has been scheduled.</div>';
    header("Location: ../offcanvas.php");
    exit();
} catch(PDOException $e) {
    error_log("Error inserting appointment: " . $e->getMessage(), 0); // Log error
    $_SESSION['status'] = '<div class="alert alert-danger" role="alert">Error: Appointment scheduling failed.</div>';
    header("Location: ../offcanvas.php");
    exit();
}