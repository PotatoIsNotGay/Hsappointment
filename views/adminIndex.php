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
};
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
<script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body style="overflow-x:hidden; background-color:#15344a;">

<!-- header nav -->
<div class="bg-dark w-100 text-end">
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="#">HOME ADMIN PANEL</a>
      <a class="" href="../actions/etpLogout.php">
        <button class="btn btn-outline-light">LOGOUT</button>
      </a>
    </div>
  </nav>
</div>

<div class="row mt-4">

  <!-- stuff data show div -->
  <div class="col-lg-3">
    <?php include"adminNav.php";?>
  </div>

  <div class="col-lg-9">
    <div class="row">
      <div class="col-lg-4">
        <div class="container text-center rounded border shadow-lg" style="background-color:#a3c3f7;">
          <h3 class="pt-3 pb-3">
            <i class="fa-regular fa-solid fa-hospital"></i>
            <br>
            Departments
          </h3>
          <?php
          $querydep = 'SELECT * FROM specialists';
          $querydep_run = $conn->query($querydep);

          // Check if the statement execution was successful
          if ($querydep_run) {
            // Since execution was successful, retrieve the number of rows
            $row_countdep = $querydep_run->rowCount();
            echo "<h4>TOTAL:".$row_countdep."</h4>";
          } else {
            // Handle the case where the query execution failed
            echo "<p>Query failed!</p>";
          }
          ?>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="container text-center rounded border shadow" style="background-color:#eafa9b;">
          <h3 class="pt-3 pb-3"> 
            <i class="fa-duotone fa-user-doctor-hair"></i>
            <br>
            Doctors 
          </h3>
          <?php
          $querydoc = 'SELECT * FROM doctors';
          $query_rundoc = $conn->query($querydoc);

          // Check if the statement execution was successful
          if ($query_rundoc) {
            // Since execution was successful, retrieve the number of rows
            $row_countdoc = $query_rundoc->rowCount();
            echo "<h4>TOTAL:".$row_countdoc."</h4>";
          } else {
            // Handle the case where the query execution failed
            echo "<p>Query failed!</p>";
          }
          ?>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="container text-center rounded border shadow" style="background-color:#f5b5ce;">
          <h3 class="pt-3 pb-3"> 
            <i class="fa-solid fa-users"></i>
            <br>
            Patients Control
          </h3>
          <?php
          $total_count1 = 0;
        
          // Cardiac Surgeons
          $query1 = 'SELECT COUNT(*) FROM appoiments';
          $query_run1 = $conn->query($query1);
          if ($query_run1) {
            $row_count1 = $query_run1->fetchColumn();
            $total_count1 += $row_count1;
          }
        
          $total = $total_count1;
          echo "<h4>TOTAL:".$total."</h4>";
          ?>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-8">
        <?php include"docChart.php";?>
      </div>
      <div class="col-lg-4">
        <div class="container text-center rounded border shadow" style="background-color:#9ae3bc; height: 200px;">
          <h3 class="pt-3 pb-3"> 
            <i class="fa-solid fa-clock-one-thirty fa-spin"></i>
            <br>
            <br>
            <b>CURRENT TIME</b>
          </h3>
          <h3 id="myanmar-time"></h3>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function updateMyanmarTime() {
    var now = new Date();
    var options = {timeZone: 'Asia/Yangon', hour24: false};
    var myanmarTime = now.toLocaleString('en-UK', options);
    document.getElementById("myanmar-time").innerHTML = myanmarTime;
  }

  // Update time every second
  setInterval(updateMyanmarTime, 1000);

  // Initial call to display time immediately
  updateMyanmarTime();
</script>

</body>
</html>
<?php 
exit();
}
else{
  header("Location:../views/etpForm.php");
  exit();
}
 ?>
