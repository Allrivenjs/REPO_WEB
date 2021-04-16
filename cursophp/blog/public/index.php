<?php
    include_once '../config.php';
    $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
    $query->execute();
    $blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
          rel="stylesheet">
    <title>Blog en Php</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog Title</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($blogPosts as $row): ?>
                    <div class="blog-post">
                        <h2><?= $row['title']; ?></h2>
                        <p>Jan 1, 2020 by <a href="">Alex</a></p>
                        <div class="blog-post-image">
                            <img width="75%" src="images/gaming-keyboards-200-01.jpg" alt="">
                        </div>
                        <div class="blog-post-conten"><?= $row['content']; ?></div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-md-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci, corporis deserunt eius expedita, harum illo labore magni natus, omnis provident quidem quis quos reiciendis rem repellat sequi sunt veritatis!
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <footer>
                    This is a footer <br>
                    <a href="admin/index.php">Admin</a>
                </footer>
            </div>
        </div>
        
    </div>




<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>