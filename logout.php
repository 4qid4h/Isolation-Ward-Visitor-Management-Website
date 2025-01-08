<?php
session_start();
//session_destroy();
unset($_SESSION['username']);
header("Location: index.php?logout_msg=You have successfully logged out.");
exit();

?>