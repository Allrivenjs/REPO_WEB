<?php
include_once '../../config.php';

$result = false;

if(!empty($_POST)){
    $sql = 'INSERT INTO blog_posts (title, content) VALUES (:title, :content)';
    $query=$pdo->prepare($sql);
    $result=$query->execute([

            'title'=>$_POST['title'],
            'content'=>$_POST['content']
    ]);

}


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
            <?php
                    if($result){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Holy guacamole!</strong> your post save!!!
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
            ?>
            <h2>Posts</h2>
            <a class="btn btn-default" href="posts.php">Back</a>

            <form action="insert-post.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Email address</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Confirm Post</button>
                </div>
            </form>

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

<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }
</script>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>