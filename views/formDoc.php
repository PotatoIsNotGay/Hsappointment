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
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed">
    <div class="container-fluid">
      <a class="text-decoration-none text-light" href="adminindex.php"> <i class="fa-solid fa-arrow-left"></i> Back to Home Page </a>
      <a class="navbar-brand text-light" href="formdoc.php">DOCTOR VIEW </a>
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
<div class="col-lg-8 px-2">
    <div class="container card float-start mt-1 py-3 mx-2" style="background-color:#759e97;">
        <div class="card-header text-center h3 py-3 text-light">Add Doctors</div>
        <div class="card-body">
            <form action="../actions/addDoc.php" method="post" enctype="multipart/form-data">
                <label for="" class="form-label text-light">Image</label>
                <input type="file" name="image" id="" placeholder="" class="form-control">
                <br>
                <label for="" class="form-label text-light">Name:</label>
                <input type="text" name="name" id="" placeholder="" class="form-control"> 
                <br>
                <label for="" class="form-label text-light">Age:</label>
                <input type="text" name="age" id="" placeholder="" class="form-control"> 
                <br>
                <label for="" class="form-label text-light">Qualiification:</label>
                <input type="text" name="qualification" id="" placeholder="" class="form-control"> 
                <br>
                <label for="" class="form-label text-light">Specialist Type:</label>
                    <select class="form-select form-select-striped-md" name="specialists">
                    <?php
                        $sql1 = "SELECT *
                        FROM specialists";

                        $result1 = $conn->query($sql1);
                        if(isset($result1)){
                            while($row1 = $result1->fetch()){
                            echo "
                            <option class='dropdown'>".$row1['name']."</option>";
                            }
                        }
                    ?>
                    
                    </select>
                    <br>
                    <label for="" class="form-label text-light">Schedule Time 1</label>
                    <select class="form-select form-select-striped-md" name="sch1">
                    <?php
                        $sql1 = "SELECT *
                        FROM schedules1";

                        $result1 = $conn->query($sql1);
                        if(isset($result1)){
                            while($row1 = $result1->fetch()){
                            echo "
                            <option class='dropdown'>".$row1['time']."</option>";
                            }
                        }
                    ?>
                    </select>
                    <br>
                    <label for="" class="form-label text-light">Schedule Time 2</label>
                    <select class="form-select form-select-striped-md" name="sch2">
                    <?php
                        $sql1 = "SELECT *
                        FROM schedules2";

                        $result1 = $conn->query($sql1);
                        if(isset($result1)){
                            while($row1 = $result1->fetch()){
                            echo "
                            <option class='dropdown'>".$row1['time']."</option>";
                            }
                        }
                    ?>
                    </select>
                    <br>
                <input type="submit" class="btn form-control btn-dark">
            </form>
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