<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {
   session_start();
   session_destroy();
   unset($_POST);
   header("Location: ..");
   exit();
}
header('HTTP/1.0 404 Not Found');
exit();