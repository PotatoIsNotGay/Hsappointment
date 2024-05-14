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
    <title>VIEW DOCTOR</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body style="overflow-x:hidden; background-color:#193a45;">

<div class="bg-dark w-100 text-end">
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <a class="text-decoration-none text-light" href="adminIndex.php"> <i class="fa-solid fa-arrow-left"></i> Back to Home Page </a>
            <a class="navbar-brand text-light" href="formDoc.php">DEPARTMENT VIEW</a>
            <a class="" href="../actions/etpLogout.php">
                <button class="btn btn-outline-light">LOGOUT</button>
            </a>
        </div> 
    </nav>
</div>
<div class="container-fluid">
            <?php
            //alert box for adding department
            if(isset($_SESSION['status'])) {
                echo $_SESSION['status'];
                unset($_SESSION['status']);
            }
            ?>
        </div>
<div class="row mt-4">
    <!-- stuff data show div -->
    <div class="col-lg-3">
        <?php include "adminNav.php";?>
    </div>

    <div class="col-lg-8">
        
        <table class="table mt-2">
            <thead>
                <tr class="text-light">
                    <td>ID</td>
                    <td>MYANMAR NAME</td>
                    <td>NAME</td>
                    <td>ACTIONS</td> <!-- New column for buttons -->
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT *
                        FROM specialists";

                $result = $conn->query($sql);
                if(isset($result)){
                    while($row = $result->fetch()){
                        echo "<tr class='text-light'>
                                  <td>" . $row['id'] . "</td>
                                  <td>" . $row['mya_name'] . "</td>
                                  <td>" . $row['name'] . "</td>
                                  <td>
                                    <button class='btn btn-outline-primary' onclick=\"window.location.href='updateDepartment.php?id=" . $row['id'] . "&myaname=" . urlencode($row['mya_name']) . "&engname=" . urlencode($row['name']) . "'\">Update</button>
                                    <button class='btn btn-outline-danger' onclick=\"deleteDepartment(" . $row['id'] . ")\">Delete</button>
                                  </td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
<script>
    function deleteDepartment(id) {
        window.location.href = '../actions/deleteDep.php?id=' + id;
    }
</script>
</html>
<?php 
exit();
}
else{
    header("Location:../views/etpForm.php");
    exit();
}
?>
