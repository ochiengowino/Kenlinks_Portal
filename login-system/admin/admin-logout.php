<?php
session_start();
// ../../index.php
unset($_SESSION['username']);

header('location: index.php');
exit();
?>



