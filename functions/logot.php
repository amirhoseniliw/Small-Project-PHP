<?php 
session_start();
if ($_SESSION['status']===false) {
    redirect('auth/login.php');
   }?>