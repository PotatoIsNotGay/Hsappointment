<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creative Navbar</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    .navbar-brand {
      font-weight: bold;
      color: #20c78f; /* Adjust brand color to your preference */
      font-size: 2rem; /* Increase brand font size */
    }
    .navbar-nav {
      margin-left: auto; /* Center links horizontally */
    }
    .nav-link {
      color: #333; /* Adjust link text color to your preference */
      padding: 1rem 2rem; /* Adjust link padding for spacing */
      border-bottom: 2px solid transparent; /* Underline on hover effect */
      transition: border-color 0.8s ease;
      font-size: 18px; /* Add transition for slower hover effect */
    }

    .nav-link:hover {
      border-color: #01040d; /* Change underline color on hover */
    }

    /* Remove focus ring from nav toggler */
    .navbar-toggler:focus {
      outline: none;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Hospital</a>  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav px-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="healthTip.php">Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.php">FAQs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="department.php">Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="offcanvas.php">My Acc</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
