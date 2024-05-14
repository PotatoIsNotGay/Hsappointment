<?php
session_start();
if (isset($_SESSION['admin_name'])) {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hsappointment";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if blog ID is provided in the URL
    if (isset($_GET['id'])) {
        $blog_id = $_GET['id'];
        
        // Retrieve blog data from the database based on the ID
        $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
        $stmt->bind_param("i", $blog_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if blog exists
        if ($result->num_rows > 0) {
            $blog = $result->fetch_assoc();
        } else {
            // Redirect if blog does not exist
            header("Location: adminindex.php");
            exit();
        }
    } else {
        // Redirect if blog ID is not provided
        header("Location: adminindex.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
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
      <?php include "adminNav.php";?>
    </div>
<!-- update form -->
<div class="col-lg-8 px-2">
    <div class="container">
        <div class="card mt-2 w-100" style="background-color:#5a7596;">
            <div class="card-header text-center text-light">Update Blog</div>
            <div class="card-body">
                <form action="../actions/updateBlog.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $blog['id'] ?>"> <!-- Hidden input field for blog ID -->
                    <label for="" class="form-label mb-3 text-light">Image</label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <label for="" class="mb-3 text-light">Title</label>
                    <input type="text" name="title" class="form-control mb-3" value="<?= $blog['title'] ?>">
                    <label for="" class="mb-3 text-light">Content</label>
                    <textarea class="form-control mb-4" name="content" rows="5"><?= $blog['content'] ?></textarea>
                    <input type="submit" class="btn btn-primary w-100" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php 
$conn->close();
exit();
}
else{
  header("Location:../views/etpForm.php");
  exit();
}
 ?>
