<?php
    require_once '../../functions/helpers.php';
    require_once '../../functions/pdo_connection.php';
    global $pdo;

    if(!isset($_GET['cat_id'])){
        redirect('panel/category');
    }

    $query = 'SELECT * FROM php_project.categories WHERE id = ?';
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['cat_id']]);
    $category = $statement->fetch();
    if($category === false)
    {
        redirect('panel/category');
    }

    if(isset($_POST['btn']) && $_POST['name'] !== ''){
   
        $query = 'UPDATE php_project.categories SET name = ?, updated_at = NOW() WHERE id = ? ;';
        $statement = $pdo->prepare($query);
        $statement->execute([$_POST['name'], $_GET['cat_id']]);
        redirect('panel/category');
    }

    
    
    
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" media="all" type="text/css">
    <link rel="stylesheet" href="../../assets/css/style.css" media="all" type="text/css">
</head>
<body>
<section id="app">

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
            </section>
            <section class="col-md-10 pt-3">

                <form action="<?=  url('panel/category/edit.php?cat_id=').$_GET['cat_id']?>" method="post">
                    <section class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"  value="<?= $category->name ?>">
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary" name="btn">Update</button>
                    </section>
                </form>

            </section>
        </section>
    </section>

</section>

<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>