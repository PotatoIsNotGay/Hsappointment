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

              $id = $_POST['id'];
              $table = $_GET['sch'];

              // query with prepared statement
              $sql = "SELECT * FROM $table WHERE id = :id";
              $query = $conn->prepare($sql);
              $query->bindParam(':id', $id, PDO::PARAM_INT);

              try {
                  $query->execute();
                } catch(PDOException $e) {
                  echo "Error fetching data: " . $e->getMessage();
                }
              $fetch = $query->fetchAll();
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


    <!-- addition form -->
    <div class="justify-content-center d-flex">
        <div class="container card mt-5 py-3 mx-4 w-50" style="background-color:#f0cea8;">
            <div class="card-header text-center h3 py-3" style="background-color:#f0cea8;">UPDATE SCHEDULE</div>
            <?php foreach($fetch as $row1): ?>
            <div class="card-body" style="background-color:#f0cea8;">
                <form action="../actions/updateSchedule.php?sch=<?= $table ;?>" method="post">
                    <label for="" class="form-label">ID</label>
                    <input type="text" readonly name="id" placeholder="" class="form-control" value="<?= $row1['id'] ?>">
                    <br>
                    <label for="" class="form-label">SCHEDULE</label>
                    <input type="text" name="time" id="" placeholder="" class="form-control" value="<?= $row1['time'] ?>"> 
                    <br>
                    <input type="submit" class="btn form-control btn-dark">
                </form>
            </div>
        </div>
        <?php endforeach; ?>
  </div>
</body>
</html>