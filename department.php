<!DOCTYPE html>
<html lang="en">
<head>
  <style>
.container:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 60px 0 rgba(0, 0, 0, 0.19);
  background-color: #19214f;
  color: #bdc2de;
  transition: 0.5s ease;
}

  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
  <title>Department</title>
</head>
<body style="overflow-x:hidden;">
<?php include"nav.php";?>
<div class="row">
  <?php
  include 'dbconn.php';


  try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  }

  $sql = "SELECT * FROM specialists";
  $result = $conn->query($sql);
  
  ?>
  <?php foreach($result as $row) :?>
    <div class='col-lg-4'>
        <a href="doctors.php?id=<?= $row['id'] ?>" class="text-decoration-none text-dark">
        <div class='container mx-1 my-4 px-2 py-2 border shadow juatify-content  text-center align-items-center rounded'>
          
          <h5><?= $row['mya_name'] ?>
            <br>
            <?= $row['name'] ?></h5>
          
            <p class='text-light'>View Doctor
              <i class='fa-solid fa-greater-than'></i>
            </p>
            
        </div>
        </a>
        
      </div>
      <?php endforeach ?>
  </div>
  <?php include"footer.php";?>

</body>
</html>