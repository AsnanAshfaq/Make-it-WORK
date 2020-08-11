<?php
session_start();
unset($_SESSION['email']); 
unset($_SESSION['user_id']);
session_destroy();
header("http://localhost/Make%20It%20Work/signIn.php");
exit();
?>