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
        if($post !== false)
        {
        if ($post->status == 10) {
            $vaziat = '1';
        }
        else{
            $vaziat = '10';

        }
        $query= "UPDATE `posts` SET `status`=? WHERE id= ?";
        $test= $pdo->prepare($query);
        $test->execute([$vaziat,$_GET['post_id']]);}
        redirect('panel/post');
        ?>