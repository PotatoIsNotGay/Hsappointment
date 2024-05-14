<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Healthtips</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style2.css">
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php include"nav.php"; ?>

<?php
include 'dbconn.php';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $blog_id = intval($_GET['id']);
} else {
  echo "Invalid blog ID";
  exit;
}

$sql = "SELECT * FROM blogs WHERE id = ?";
$query = $conn->prepare($sql);
$query->execute([$blog_id]);
$detail = $query->fetch();
?>

<?php if ($detail) : ?>
<div class="container">
    <h1 class="h2 text-center mt-3 fw-bold text-success text-uppercase"><?= $detail['title'] ?></h1>
    <hr class='border border-success border-3 opacity-75 mt-4 m-5'>
    <br>
    <img src="Photos/<?= $detail['image'] ?>" alt="" class="w-sm-100 w-50 img-thumbnail rounded mx-auto d-block shadow">
    <br>
    <p clas   s="mx-4 my-4 lh-lg fs-5"><?= nl2br($detail['content']); ?></p>
</div>
<?php else : ?>
    <p>No blog found with the provided ID</p>
<?php endif; ?>

<?php include"footer.php"?>

</body>
</html>
