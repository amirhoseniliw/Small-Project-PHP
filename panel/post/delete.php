<?php
    require_once '../../functions/helpers.php';
    require_once '../../functions/pdo_connection.php';

    global $pdo;

if(!isset($_GET['post_id']))
        {
            redirect('panel/post');
        }
        $query = 'SELECT * FROM php_project.posts WHERE id = ?';
        $statement = $pdo->prepare($query);
        $statement->execute([$_GET['post_id']]);
        $post = $statement->fetch();
        if($post === false)
        {
            redirect('panel/post');
        }
        $query= "DELETE FROM `posts`WHERE id= ?";
        $test= $pdo->prepare($query);
        $test->execute([$_GET['post_id']]);
        redirect('panel/post');?>