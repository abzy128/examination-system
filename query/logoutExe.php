<?php 
session_start();

// Ending session by deleting cookie file
session_unset();
session_destroy();

// Move to login page
header("location:../");

 ?>