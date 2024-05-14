<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    
    .card{
      transition : all 0.3s;
    }
    .card:hover{
      transform : scale(1.10);
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>Doctors</title>
</head>
<body>
<?php include"nav.php"; ?>

<div class='container'>

<?php
include 'dbconn.php';


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $specialist_id = intval($_GET['id']);
  } else {
    echo "Invalid specialist ID";
    exit;
  }

  $sqlSpecialist = "SELECT mya_name, name FROM specialists WHERE id = ?";
  $resultSpecialist = $conn->prepare($sqlSpecialist);
  $resultSpecialist->execute([$specialist_id]);

  if ($resultSpecialist->rowCount() === 0) {
    echo "Specialist not found";
    exit;
  }

  $specialist_row = $resultSpecialist->fetch(PDO::FETCH_ASSOC);
  ?>
  <h1 class='h2 text-center mt-3 fw-bold text-success'>
    <?= $specialist_row['mya_name'] . "(" . $specialist_row['name'] . ")" ?>
  </h1>
  <hr class='border border-success border-3 opacity-75 mt-4 m-5'>
  <div class='row mt-5 mx-5'>
  <?php

  $sqlDoctors = "SELECT id, name, age, qualification, image FROM doctors WHERE specialist_id = ?";
  $resultDoctors = $conn->prepare($sqlDoctors);
  $resultDoctors->execute([$specialist_id]);

  foreach ($resultDoctors as $row) {
    ?>
    <div class='col-12 col-md-6 col-lg-4 mt-3'>
      <div class='card w-100 h-100'>
        <img src='Photos/<?= $row['image'] ?>' alt=''>
        <div class='card-body'>
          <h5 class='card-title fw-bold'><?= $row['name'] ?></h5>
          <p class='fw-bold'>
            Age: <?= $row['age'] ?><br>
            Qualification: <?= $row['qualification'] ?>
          </p>
          <a href="Appointment.php?doctor_id=<?= $row['id'] ?>&specialist_id=<?= $specialist_id ?>" class='btn btn-primary'>Choose Doctor</a>

        </div>
      </div>
    </div>
    
    <?php
  }

} catch(PDOException $e) {
  echo "Error executing query: " . $e->getMessage();
  exit;
}

$conn = null;
?>
</div>

</body>
</html>
