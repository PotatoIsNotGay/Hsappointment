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
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
<body>
    <div>
        <ul class="list-group pt-4 text-center text-lg-start">
            <li class="list-group-item d-none d-lg-inline mb-4 py-3 text-light border-dark" style="background-color: #040b29;">
                CONTROLS
                <a href="adminIndex.php">
                    <span class="float-end text-light">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </a>
            </li>
            <?php
            $sql = "SELECT * FROM specialists";
            $result = $conn->query($sql);

            foreach($result as $row) : ?>
                <li class="list-group-item border-dark shadow-lg" style="background-color: #041b21;">
                    <a href="patientcontrol.php?id=<?= $row['id'] ?>" style="text-decoration:none" class="text-light">
                        <span class=" d-none d-lg-inline"><?= $row['name'] ?></span>
                        <?php
                        // Count appointments for each specialist
                        $specialistId = $row['id'];
                        $table = "SELECT * FROM appoiments WHERE specialist_id = $specialistId";
                        $query = $conn->query($table);

                        if ($query) {
                            // Retrieve the number of rows (appointments)
                            $row_count = $query->rowCount();
                            echo "<span class='badge badge-primary float-end' style='background-color:bisque; color:red;'>$row_count</span>";
                        } else {
                            // Handle the case where the query execution failed
                            echo "<p>Query failed!</p>";
                        }
                        ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</body>
</html>
