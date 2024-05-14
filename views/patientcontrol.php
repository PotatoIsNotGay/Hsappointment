<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>specialization</title>
</head>
<body style="overflow-x:hidden; overflow-y:hidden;" class="bg-dark">
    
    <!-- header nav -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#09091a;">
    <div class="container-fluid">
    <?php
    include '../dbconn.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // Retrieve specialist_id from the URL
    $your_specialist_id = isset($_GET['id']) ? $_GET['id'] : null;

    // Check if a specialist_id is provided
    if ($your_specialist_id) {
        $sqlaccept = "SELECT appoiments.id AS id , user_id ,users.name AS user_name , patient_name ,phone_number , doctors.name AS doctor_name , specialists.name AS specialist_name , schedule FROM appoiments,doctors,users,specialists WHERE user_id = users.id AND appoiments.specialist_id = :specialist_id AND doctors.id = appoiments.doctor_id AND specialists.id = appoiments.specialist_id AND accept = 1";

        $sqlyet = "SELECT appoiments.id AS id, users.name AS user_name , patient_name ,phone_number , doctors.name AS doctor_name , specialists.name AS specialist_name , schedule FROM appoiments,doctors,users,specialists WHERE user_id = users.id AND appoiments.specialist_id = :specialist_id AND doctors.id = appoiments.doctor_id AND specialists.id = appoiments.specialist_id AND accept = 0";

        $sql1 = "SELECT * FROM specialists WHERE id = $your_specialist_id";
                
        $stmt = $conn->prepare($sqlaccept);
        $stmy = $conn->prepare($sqlyet);
        $sql1_run = $conn->query($sql1);

        $stmt->bindParam(':specialist_id', $your_specialist_id, PDO::PARAM_INT);
        $stmt->execute();

        $stmy->bindParam(':specialist_id', $your_specialist_id, PDO::PARAM_INT);
        $stmy->execute();}
         foreach($sql1_run as $title ):?>
            <a class="navbar-brand" href="#"><?= $title['name'] ?></a>
        <?php endforeach; ?>
        <a class="" href="#">
            <button class="btn btn-light">LOGOUT</button>
        </a>
    </div>
    </nav>



    <div class="row mt-1 mb-4">
        <div class="col-lg-2">
            <?php $page = 'patientcontrol'; ?>
            <?php if($page == 'patientcontrol') include "verticalnav.php"; ?>
        </div>

        <div class="col-lg-10">
            <table class="table table-dark mt-4 text-light">
                <thead>
                    <tr class="">
                        <td>ID</td>
                        <td>USER NAME</td>
                        <td>PATIENT NAME</td>
                        <td>PHONE NUMBER</td>
                        <td>DOCTOR NAME</td>
                        <td>SPECIALIZATION</td>
                        <td>SCHEDULE</td>
                        <td>
                            <form action="../actions/clear.php" method="post">
                                
                                <input type="hidden" name='id' value="<?php echo $your_specialist_id ;?>">
                                <button type='submit' class='btn btn-outline-warning'>CLEAR DATABASE</button>
                            </form>
                        </td>
                    </tr>
                </thead>
                <tbody class="text-light">
                    
                        <?php foreach ($stmt as $row): ?>
                            <tr>
                                <form action='../actions/cancel.php' method='post'>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['user_name'] ?></td>
                                <td><?= $row['patient_name'] ?></td>
                                <td><?= $row['phone_number'] ?></td>
                                <td><?= $row['doctor_name'] ?></td>
                                <td><?= $row['specialist_name'] ?></td>
                                <td><?= $row['schedule'] ?></td>
                                    <input type='hidden' name='table' value='appoiments'>
                                    <input type='hidden' name='id' value='<?= $row['id'] ?>'>
                                    <td><button type='submit' class='btn btn-outline-danger'>CANCEL</button></td>
                                </form>
                            </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

    <table class="table mt-1 table-dark ms-4">
    <thead>
        <tr class="text-light">
            <td>USER NAME</td>
            <td>PATIENT NAME</td>
            <td>PHONE NUMBER</td>
            <td>DOCTOR NAME</td>
            <td>SPECIALIZATION</td>
            <td>SCHEDULE</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stmy as $row): ?>
            <tr class="text-light">
                <form action='../actions/accept.php' method='post'>
                    <td><?= $row['user_name'] ?></td>
                    <td><?= $row['patient_name'] ?></td>
                    <td><?= $row['phone_number'] ?></td>
                    <td><?= $row['doctor_name'] ?></td>
                    <td><?= $row['specialist_name'] ?></td>
                    <td><?= $row['schedule'] ?></td>
                    <input type='hidden' name='id' value='<?= $row['id'] ?>'>
                    <td><button type='submit' class='btn btn-outline-success'>ACCEPT</button></td>
                </form>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

</body>
</html>
