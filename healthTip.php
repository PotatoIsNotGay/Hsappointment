<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Explicitly define database connection parameters
$servername = "localhost"; // MySQL Host Name
$username = "root"; // MySQL User Name
$password = ""; // MySQL Password
$dbname = "hsappointment"; // MySQL DB Name

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Fetch blogs from the database
    $stmt = $conn->prepare("SELECT * FROM blogs");
    $stmt->execute();
    $blogs = $stmt->fetchAll();
} catch(PDOException $e) {
    // Display error message if connection fails
    echo "Connection failed: " . $e->getMessage();
    exit(); // Terminate script execution after displaying the error
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Articles</title>
    <link rel="stylesheet" href="css/healthtip.css">
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .card {
            transition: all 0.3s ease-in-out;
            overflow: hidden;
            text-overflow: ellipsis;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-family: 'Roboto', sans-serif;
        }
        .card-body {
            padding: 20px;
        }
        .btn {
            transition: all 0.3s ease-in-out;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body style="overflow-x:hidden;">
    <?php include "nav.php"; ?>
    
    <main role="main" class="col-md-10 px-4 mx-auto">
        <div class="pt-3 pb-2 mb-3 text-center">
            <h1 class="h2 text-success">Health Tips</h1>
            <hr class='border border-success border-3 opacity-75 '>
        </div>
        
        <!-- Session status message display -->
        <?php
        if(isset($_SESSION['status'])) {
            echo $_SESSION['status'];
            unset($_SESSION['status']); // Clear the session status message
        }
        ?>
        
        <div class="row">
            <?php foreach ($blogs as $blog) : ?>
                <div class="col-12 col-md-6 col-lg-4 col-sm-12 mb-4">
                    <div class="card w-100 h-100" data-aos="flip-left">
                        <img src="Photos/<?= $blog['image'] ?>" class="card-img-top" style="height:200px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $blog['title'] ?></h5>
                            <p class="card-text mt-4">
                                <?php
                                $string =  $blog['content'];
                                $trimstring = substr($string, 0, 180);
                                echo $trimstring;
                                ?>
                                <br>
                                <br>
                                <br>
                                <a href="blog.php?id=<?= $blog['id'] ?>" class="btn btn-success float-start">See More</a>
                                <?php if(isset($_SESSION['admin_name'])): ?>
                                    <!-- Update and Delete buttons -->
                                    <a href="views/updateBlog.php?id=<?= $blog['id'] ?>" class="btn btn-primary float-start mx-2">Update</a>
                                    <a href="actions/deleteBlog.php?id=<?= $blog['id'] ?>" class="btn btn-danger float-start">Delete</a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </main>

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
