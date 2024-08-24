<?php  require_once 'functions/helpers.php';
    require_once 'functions/pdo_connection.php';  
      require_once 'functions/logot.php';
    global $pdo;
     $query="SELECT posts.*, categories.name AS NAME01 FROM `posts` JOIN categories ON posts.cat_id = categories.id WHERE posts.status=1 && posts.id= ? ";
     $statment = $pdo->prepare($query);
      $statment->execute([$_GET['postID']]);
      $posts= $statment->fetch();
      
      ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" media="all" type="text/css">
<body>
<section id="app">
<?php require_once "layouts/top-nav.php"?>
    <section class="container my-5">
        <!-- Example row of columns -->
        <section class="row">
        
            <section class="col-md-12">
                <h1><?= $posts->title?></h1>
                <h5 class="d-flex justify-content-between align-items-center">
                    <a href="<?= url('category.php?cat_id='). $posts->cat_id?>"><?= $posts->NAME01?></a>
                    <span class="date-time"><?= $posts->created_at?></span>
                </h5>
                <article class="bg-article p-3"><img class="float-right mb-2 ml-2" style="width: 30px;" src="<?= asset($posts->img) ?>" alt="error" ><?=substr($posts->body, 0 , 10)  ?></article>
            
                    
             
            </section>
            <?php if (!$posts) {
                
             ?>
            <section>post not found!</section><?php }?>
        </section>
    </section>

</section>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>