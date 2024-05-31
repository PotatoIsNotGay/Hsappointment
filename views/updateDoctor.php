<?php
session_start();

// Check if admin is logged in
if(isset($_SESSION['admin_name'])){
    include '../dbconn.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit(); // Stop execution if database connection fails
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctor</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body style="overflow-x:hidden; background-color:#193a45;">

<div class="bg-dark w-100 text-end">
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <a class="text-decoration-none text-light" href="adminIndex.php"> <i class="fa-solid fa-arrow-left"></i> Back to Home Page </a>
      <a class="navbar-brand text-light" href="formDoc.php">DOCTOR VIEW </a>
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
    
    <!-- Update Doctor Form -->
    <div class="col-lg-8 px-2">
        <div class="container card float-start mt-1 py-3 mx-2" style="background-color:#759e97;">
            <div class="card-header text-center h3 py-3 text-light">Update Doctor</div>
            <div class="card-body">
                <form action="../actions/updateDoc.php" method="post" enctype="multipart/form-data">
                    <?php
                    // Fetch doctor's information based on ID
                    $doctor_id = $_GET['id'];
                    $sql = "SELECT * FROM doctors WHERE id = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':id', $doctor_id);
                    $stmt->execute();
                    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    // Fetch current specialist and schedule IDs
                    $current_specialist_id = $doctor['specialist_id'];
                    $current_schedule1_id = $doctor['schedule1_id'];
                    $current_schedule2_id = $doctor['schedule2_id'];
                    ?>
                    
                    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
                    
                    <label for="image" class="form-label text-light">New Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <br>
                    
                    <label for="name" class="form-label text-light">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($doctor['name']); ?>">
                    <br>
                    
                    <label for="age" class="form-label text-light">Age:</label>
                    <input type="text" name="age" id="age" class="form-control" value="<?php echo htmlspecialchars($doctor['age']); ?>">
                    <br>
                    
                    <label for="qualification" class="form-label text-light">Qualification:</label>
                    <input type="text" name="qualification" id="qualification" class="form-control" value="<?php echo htmlspecialchars($doctor['qualification']); ?>">
                    <br>
                    
                    <label for="specialists" class="form-label text-light">Specialist Type:</label>
                    <select class="form-select" name="specialists" id="specialists">
                        <?php
                        $sql1 = "SELECT * FROM specialists";
                        $result1 = $conn->query($sql1);
                        while($row1 = $result1->fetch()){
                            $selected = ($row1['id'] == $current_specialist_id) ? 'selected' : '';
                            echo "<option value='".$row1['id']."' $selected>".$row1['name']."</option>";
                        }
                        ?>
                    </select>
                    <br>
                    
                    <label for="sch1" class="form-label text-light">Schedule Time 1:</label>
                    <select class="form-select" name="sch1" id="sch1">
                        <?php
                        $sql2 = "SELECT * FROM schedules1";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch()){
                            $selected = ($row2['id'] == $current_schedule1_id) ? 'selected' : '';
                            echo "<option value='".$row2['id']."' $selected>".$row2['time']."</option>";
                        }
                        ?>
                    </select>
                    <br>
                    
                    <label for="sch2" class="form-label text-light">Schedule Time 2:</label>
                    <select class="form-select" name="sch2" id="sch2">
                        <?php
                        $sql3 = "SELECT * FROM schedules2";
                        $result3 = $conn->query($sql3);
                        while($row3 = $result3->fetch()){
                            $selected = ($row3['id'] == $current_schedule2_id) ? 'selected' : '';
                            echo "<option value='".$row3['id']."' $selected>".$row3['time']."</option>";
                        }
                        ?>
                    </select>
                    <br>
                    
                    <input type="submit" class="btn form-control btn-dark" value="Update">
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
