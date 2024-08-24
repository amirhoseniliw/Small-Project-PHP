<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
if (isset($_GET['cat_id']) && $_GET['cat_id'] !== '') {
    global $pdo;
    $query = "DELETE FROM `categories` WHERE id = ?";
    $statment = $pdo->prepare($query);
    $statment->execute([$_GET['cat_id']]);
   
}
redirect('panel/category');