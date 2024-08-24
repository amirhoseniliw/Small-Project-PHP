<?php
require_once 'functions/helpers.php';
require_once 'functions/pdo_connection.php';
require_once 'functions/logot.php';




global $pdo;
$query = "SELECT * FROM `posts` WHERE status=1 && cat_id=?";
$statment = $pdo->prepare($query);
$statment->execute([$_GET['cat_id']]);
$posts = $statment->fetchAll(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" media="all" type="text/css">
</head>

<body>
    <section id="app">
        <?php require_once "layouts/top-nav.php" ?>
        <section class="container my-5">

            <section class="row">
                <section class="col-12">
                    <hr>
                </section>
            </section> 
                <section class="row">
                    
                    <?php
foreach ($posts as $post) {
                        ?>

                    <section class="col-md-4">
                        <section class="mb-2 overflow-hidden" style="max-height: 15rem;"><img class="img-fluid" width="40px" src="<?= asset($post->img) ?>" alt="error"></section>
                        <h2 class="h5 text-truncate"><?= $post->title ?></h2>
                        <p><?= $post->body ?></p>
                        <p><a class="btn btn-primary" href="<?= url('detail.php?postID='). $post->id?>" role="button">View details »</a></p>
                    </section>
               <?php } ?>
                </section> 

                <section class="row">

                    <section class="col-12">
                        <?php if (!$posts) {

                        ?>

                            <h1>Category not found</h1><?php } ?>
                    </section>
                </section>

        </section>
    </section>

    </section>
    <script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>