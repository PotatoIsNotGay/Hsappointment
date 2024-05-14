<?php
session_start();

session_destroy();

header("Location:../views/etpForm.php?logout");  // Redirect to a logout page (optional)
