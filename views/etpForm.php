<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Blob Animation And Glassmorphism with CSS</title>
  <link rel="stylesheet" href="../css/etpstyle.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <!--Stylesheet-->

</head>
<body>
<?php
session_start(); // Start the session
if(isset($_SESSION['login_error'])) {
    echo $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>
<!-- partial:index.partial.html -->
<div class="container">
      <div class="card">
        <form action="../actions/etpLogin.php" method="post">
          <h3>Login As A Stuff</h3>
  
          <label for="username">Username</label>
          <input type="text" placeholder="Exact User Name" id="username" name="username">

          <label for="email">Email</label>
          <input type="email" placeholder="Email" id="email" name="email">
 
          <label for="password">Password</label>
          <input type="password" placeholder="Password" id="password" name="password">
  
          <input type="submit" value="Log in" id="button">
      </form>
      </div>
      <div class="blob"></div>
    </div>
<!-- partial -->
  
</body>
</html>
