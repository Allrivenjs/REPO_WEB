<?php
include_once '../../config.php';
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
    <title>Manage Posts</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Manage Posts</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h2>Posts</h2>
            <a class="btn btn-primary" href="./insert-post.php">New Posts</a>
            <table class="table table-striped table-hover">
                <caption>Table content blogs</caption>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Config</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($blogPosts as $row): ?>
                    <tr>
                        <td><?= $row['title']; ?></td>
                        <td>
                            <a href="#">
                                <span class="material-icons">
                                    build
                                </span>
                            </a>
                            <a href="#">
                                <span class="material-icons">
                                    delete
                                </span>
                            </a>
                        </td>

                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci, corporis deserunt eius expedita, harum illo labore magni natus, omnis provident quidem quis quos reiciendis rem repellat sequi sunt veritatis!
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <footer>
                This is a footer <br>
                <a href="p"></a>
            </footer>
        </div>
    </div>

</div>




<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>