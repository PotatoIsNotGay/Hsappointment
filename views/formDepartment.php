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
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body style="overflow-x:hidden; background-color:#193a45;">

<div class="bg-dark w-100 text-end">
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <a class="text-decoration-none text-light" href="adminIndex.php"> <i class="fa-solid fa-arrow-left"></i> Back to Home Page </a>
      <a class="navbar-brand text-light" href="formDepartment.php">DEPARTMENT VIEW </a>
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

    <!-- addition form -->
    <div class="col-lg-8">
        <div class="container card float-start mt-5 py-3 mx-4" style="background-color:#849e75;">
            <div class="card-header text-center h3 py-3" style="background-color:#a2bd93;">Add Form</div>
            <div class="card-body" style="background-color:#a2bd93;">
                <form action="../actions/addDep.php" method="post">
                    <label for="" class="form-label">Myanmar Name:</label>
                    <input type="text" name="myaname" id="" placeholder="" class="form-control">
                    <br>
                    <label for="" class="form-label">English Name:</label>
                    <input type="text" name="engname" id="" placeholder="" class="form-control"> 
                    <br>
                    <input type="submit" class="btn form-control btn-dark">
                </form>
            </div>
        </div>
    </div>
  </div>
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