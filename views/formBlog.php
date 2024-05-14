<?php
session_start();
if(isset($_SESSION['admin_name'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
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
    <div class="container">
        <div class="card mt-2 w-100" style="background-color:#5a7596;">
            <div class="card-header text-center text-light">Add Blog</div>
            <div class="card-body">
                <form action="../actions/addBlog.php" method="post" enctype="multipart/form-data">
                    <label for="" class="form-label mb-3 text-light">Image</label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <label for="" class="mb-3 text-light">Title</label>
                    <input type="text" name="title" class="form-control mb-3">
                    <label for="" class="mb-3 text-light">Content</label>
                    <textarea class="form-control mb-4" name="content" rows="5"></textarea>
                    <input type="submit" class="btn btn-primary w-100" value="Submit">
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