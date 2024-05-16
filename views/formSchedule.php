<?php
session_start();
if (isset($_SESSION['admin_name'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <?php
    include '../dbconn.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $id = $_POST['id'];
    $table = $_GET['sch'];

    $sql = "SELECT * FROM $table WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);

    try {
        $query->execute();
    } catch (PDOException $e) {
        echo "Error fetching data: " . $e->getMessage();
    }
    $fetch = $query->fetchAll();
    ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Schedule</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <script src="../js/bootstrap.bundle.min.js"></script>
    </head>
    <body style="overflow-x:hidden; background-color:#193a45;">

    <div class="bg-dark w-100 text-end">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="text-decoration-none text-light" href="adminIndex.php"> <i class="fa-solid fa-arrow-left"></i> Back to Home Page </a>
          <a class="navbar-brand text-light" href="formDepartment.php">DEPARTMENT VIEW</a>
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

        <!-- Update schedule form -->
        <div class="col-lg-8 px-2">
            <div class="container card float-start mt-1 py-3 mx-2" style="background-color:#f0cea8;">
                <div class="card-header text-center h3 py-3 text-light">UPDATE SCHEDULE</div>
                <?php foreach ($fetch as $row1): ?>
                <div class="card-body">
                    <form action="../actions/updateSchedule.php?sch=<?= $table; ?>" method="post">
                        <input type="hidden" name="id" value="<?= $id; ?>"> <!-- Hidden input for id -->
                        <label for="time" class="form-label text-light">SCHEDULE</label>
                        <input type="text" name="time" id="time" placeholder="Enter schedule time" class="form-control" value="<?= $row1['time'] ?>">
                        <br>
                        <input type="submit" class="btn form-control btn-dark" value="Update Schedule">
                    </form>
                </div>
                <?php endforeach; ?>
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
