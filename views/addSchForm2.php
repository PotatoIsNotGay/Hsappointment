<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body style="overflow-x:hidden; background-color:#193a45;">

<div class="bg-dark w-100 text-end">
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <a class="text-decoration-none text-light" href="adminindex.php"> <i class="fa-solid fa-arrow-left"></i> Back to Home Page </a>
            <a class="navbar-brand text-light" href="formdoc.php">SCHEDULE VIEW</a>
            <a class="" href="../actions/etpLogout.php">
                <button class="btn btn-outline-light">LOGOUT</button>
            </a>
        </div> 
    </nav>
</div>

<div class="justify-content-center d-flex">
    <div class="container card mt-5 py-3 mx-4 w-50" style="background-color:#f0cea8;">
        <div class="card-header text-center h3 py-3" style="background-color:#f0cea8;">ADD SCHEDULE</div>
        <div class="card-body" style="background-color:#f0cea8;">
            <!-- Form to submit schedule data to addSchedule.php -->
            <form action="../actions/addschedule2.php" method="post">
                <label for="time" class="form-label">SCHEDULE</label>
                <input type="text" name="time" id="time" placeholder="Enter schedule time" class="form-control" required>
                <br>
                <input type="submit" class="btn form-control btn-dark" value="Add Schedule">
            </form>
        </div>
    </div>
</div>

</body>
</html>
