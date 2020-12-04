<?php session_start();
    session_unset();
    session_destroy();
    header('Location:index.php?choice=success&value= Logged Out Successfully ');
?>