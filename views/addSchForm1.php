<?php
session_start();
if(isset($_SESSION['admin_name'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include '../dbconn.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body style="overflow-x:hidden; background-color:#193a45;">

<div class="bg-dark w-100 text-end">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="text-decoration-none text-light" href="adminindex.php"> <i class="fa-solid fa-arrow-left"></i> Back to Home Page </a>
      <a class="navbar-brand text-light" href="formdoc.php">SCHEDULE VIEW</a>
      <a class="" href="../actions/etpLogout.php">
        <button class="btn btn-outline-light">LOGOUT</button>
      </a>
    </div> 
  </nav>
</div>

<div class="row mt-4">
    <!-- Side navbar -->
    <div class="col-lg-3">
      <?php include "adminNav.php"; ?>
    </div>

    <!-- Schedule form -->
    <div class="col-lg-8 px-2">
        <div class="container card float-start mt-1 py-3 mx-2" style="background-color:#f0cea8;">
            <div class="card-header text-center h3 py-3 text-light">ADD SCHEDULE</div>
            <div class="card-body">
                <!-- Form to submit schedule data -->
                <form action="../actions/addschedule1.php" method="post">
                    <label for="time" class="form-label text-light">SCHEDULE</label>
                    <input type="text" name="time" id="time" placeholder="Enter schedule time" class="form-control" required>
                    <br>
                    <input type="submit" class="btn form-control btn-dark" value="Add Schedule">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php 
exit();
} else {
  header("Location:../views/etpForm.php");
  exit();
}
?>
