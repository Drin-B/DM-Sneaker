<?php
session_start();
session_destroy();
header("Location: Hyrja.php"); // Redirect to login page after logout
exit;
?>