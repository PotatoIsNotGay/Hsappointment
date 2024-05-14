<?php
session_start();
if(isset($_SESSION['admin_name'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Department</title>
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
    <div class="col-lg-3">
        <?php include "adminNav.php";?>
    </div>

    <!-- Update form -->
    <div class="col-lg-8">
        <div class="container card float-start mt-5 py-3 mx-4" style="background-color:#849e75;">
            <div class="card-header text-center h3 py-3" style="background-color:#a2bd93;">Update Department</div>
            <div class="card-body" style="background-color:#a2bd93;">
                <form action="../actions/updateDep.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <div class="mb-3">
                        <label for="myaname" class="form-label">Myanmar Name:</label>
                        <input type="text" name="myaname" id="myaname" class="form-control" value="<?php echo $_GET['myaname']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="engname" class="form-label">English Name:</label>
                        <input type="text" name="engname" id="engname" class="form-control" value="<?php echo $_GET['engname']; ?>"> 
                    </div>
                    <button type="submit" class="btn btn-dark">Update</button>
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
