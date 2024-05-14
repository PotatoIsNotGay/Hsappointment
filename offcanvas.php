<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="overflow-x: hidden;">
  <?php include "nav.php"; ?>

  <?php
session_start();

// Database configuration
include 'dbconn.php';


// Attempt database connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Stop further execution if database connection fails
}

// Check if the user is logged in
if(isset($_SESSION['user_name'])) {
    echo'<div class="row">
    <div class="container col-lg-4">
    
    <div class="container text-center border px-2 ms-3 my-4 pt-5 rounded-5 shadow-lg w-95">
    <img src="Photos/bbe302ed8d905165577c638e908cec76.jpg" alt="" class="img-fluid rounded-circle w-25 mx-auto d-block">
    <div class="rounded-5 mt-2 py-4 text-center h6" style="background-color:#d6b1e3;">User Name:'.$_SESSION['user_name'].'</div>
    </div>
    </div>
    <div class="container col-lg-8">
            <div class="container w-75 shadow-lg py-2 mt-3 rounded-3">
              <div class="container py-2 text-center text-dark mt-4" style="background-color:#89caf5;">
                YOUR APPOINTMENT
              </div>';

    $user_name = $_SESSION['user_name'];
    
    // Fetch user's appointments
    $sql = "SELECT a.patient_name, a.phone_number, d.name AS doctor_name, s.name AS specialist_name, a.schedule 
            FROM appoiments AS a
            JOIN doctors AS d ON a.doctor_id = d.id
            JOIN users AS u ON a.user_id = u.id
            JOIN specialists AS s ON a.specialist_id = s.id
            WHERE u.name = :user_name AND a.accept = 1";
    
    $query = $conn->prepare($sql);
    $query->bindParam(':user_name', $user_name);
    $query->execute();
    $appointments = $query->fetchAll(PDO::FETCH_ASSOC);

    $sql1 = "SELECT a.patient_name, a.phone_number, d.name AS doctor_name, s.name AS specialist_name, a.schedule 
         FROM appoiments AS a
         JOIN doctors AS d ON a.doctor_id = d.id
         JOIN users AS u ON a.user_id = u.id
         JOIN specialists AS s ON a.specialist_id = s.id
         WHERE u.name = :user_name1 AND a.accept = 0";

$query1 = $conn->prepare($sql1);
$query1->bindParam(':user_name1', $user_name);
$query1->execute();
$appointments1 = $query1->fetchAll(PDO::FETCH_ASSOC);


    // Display user appointments

    if(!empty($appointments1 || $appointments)){
            // pending
              foreach($appointments1 as $appointment) {
                echo'
              <div class="container text-center border">
                <div class="container-fluid mt-4 px-4 py-4 mb-4 border rounded text-start lh-lg">
                <div class="alert alert-info mt-4 mx-5 text-center">
                Your appointment is pending approval by the hospital.
              </div>
                  Name: '.$appointment['patient_name'].'<br>
                  Phone Number: '.$appointment['phone_number'].'<br>
                  Doctor: '.$appointment['doctor_name'].'<br>
                  Specialist: '.$appointment['specialist_name'].'<br>
                  Schedule: '.$appointment['schedule'].'<br>
                </div>
              </div>';
              };
                            
              foreach($appointments as $appointment) {
                echo'
                <div class="container-fluid mt-4 px-4 py-4 mb-4 border rounded text-start lh-lg">
                <div class="alert alert-success mt-4 mx-5 text-center">
                Your appointment is approved by the hospital.
              </div>
                  Name: '.$appointment['patient_name'].'<br>
                  Phone Number: '.$appointment['phone_number'].'<br>
                  Doctor: '.$appointment['doctor_name'].'<br>
                  Specialist: '.$appointment['specialist_name'].'<br>
                  Schedule: '.$appointment['schedule'].'<br>
                </div>';
                };
    }    
     else {
        // login but no appoiment sent
        echo '
            <div class="container text-center border">
            <div class="alert alert-warning mt-4 mx-5 text-center">
            No appointment yet
            </div>
            </div>';
    }
    echo'
              <a href="actions/logout.php" class="btn mt-4 float-end shadow btn-dark text-decoration-none rounded-pill mb-4">Logout</a>
            </div>
          </div>';
} else {
    // User is not logged in
    echo '<div class="container py-5 text-center">
            You are not logged in yet.<br>
            Login as a user for more features.<br>
            <a href="loginForm.php" class="btn mt-4 rounded-pill btn-dark text-decoration-none">Login</a>
            <a href="signupForm.php" class="mt-4 rounded-pill btn text-decoration-none">Register</a>
          </div>';
}

?>

    
    <?php include"footer.php"; ?>
</body>
</html>