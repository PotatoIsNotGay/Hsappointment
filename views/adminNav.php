<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN NAVBAR</title>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
</head>
<body>
<div class="container">
      <ul class="list-group text-center text-lg-start" >
        <li class="list-group-item d-none d-lg-inline my-1 shadow" style="background-color:#0d1a42;">
          <span class="float-start" >
            <h5 class="text-light">STUFF NAME:<?php echo $_SESSION['admin_name'];?></h5>
            <h6 style="color: #2fd6b5;">POSITION:<?php echo $_SESSION['admin_position']; ?></h6>
          </span>
        </li>
      </ul>

      <ul class="list-group text-center text-lg-start" >

      <li class="list-group-item d-none d-lg-inline mb-1 shadow" style="background-color:#0e0829">
          <a href="adminIndex.php" class=" text-decoration-none text-light"> 
          <i class="fa-solid fa-house" style="color: #ffffff;"></i> Admin Home Page
          </a>
        </li>

      <li class="list-group-item d-none d-lg-inline mb-1 shadow" style="background-color:#0e0829">
          <a href="../index.php" class=" text-decoration-none text-light">
          <i class="fa-duotone fa-house-user"></i>  Public Home Page
          </a>
        </li>
        <li class="list-group-item d-none d-lg-inline shadow" style="background-color:#0e0829">
          <a href="formDepartment.php" class=" text-decoration-none text-light">
          <i class="fa-solid fa-building"></i>  Add Department</a>
        </li>
        <li class="list-group-item d-none d-lg-inline mb-1 shadow" style="background-color:#0e0829">
          <a href="viewDepartment.php" class=" text-decoration-none text-light">
          <i class="fa-solid fa-building-user"></i>  
          View Department</a>
        </li>

        <li class="list-group-item d-none d-lg-inline shadow" style="background-color:#0e0829">
          <a href="formDoc.php" class=" text-decoration-none text-light">
          <i class="fa-solid fa-user-doctor"></i>  
          Add Doctors</a>
        </li>
        <li class="list-group-item d-none d-lg-inline mb-1 shadow" style="background-color:#0e0829">
          <a href="viewDoc.php" class=" text-decoration-none text-light">
          <i class="fa-solid fa-stethoscope"></i>  
          View Doctors</a>
        </li>
        
        <li class="list-group-item d-none d-lg-inline shadow" style="background-color:#0e0829">
          <a href="formBlog.php" class=" text-decoration-none text-light">
          <i class="fa-solid fa-notes-medical"></i>  
          Add Blog</a>
        </li>
        <li class="list-group-item d-none d-lg-inline mb-1 shadow" style="background-color:#0e0829">
          <a href="../healthTip.php" class=" text-decoration-none text-light">
          <i class="fa-brands fa-blogger"></i>  
          View Blog Datas</a>
        </li>

        <li class="list-group-item d-none d-lg-inline shadow mb-1" style="background-color:#0e0829">
          <a href="viewSchedule.php" class=" text-decoration-none text-light">
          <i class="fa-solid fa-calendar-days"></i>
          View Schedule</a>
        </li>
        
        <li class="list-group-item d-none d-lg-inline mb-1 shadow" style="background-color:#0e0829">
          <a href="patientcontrol.php?id=1" class=" text-decoration-none text-light"><i class="fa-solid fa-joystick"></i> Patients Control Panel</a>
        </li>

        <li class="list-group-item d-none d-lg-inline mb-1 shadow" style="background-color:#0e0829">
          <a href="stuffregister.php" class=" text-decoration-none text-light"><i class="fa-solid fa-pen-to-square"></i> Register Stuff</a>
        </li>
      </ul>
      
      </div>
</body>
</html>