<?php
session_start();

session_destroy();

header("Location:../index.php?logout");  // Redirect to a logout page (optional)
