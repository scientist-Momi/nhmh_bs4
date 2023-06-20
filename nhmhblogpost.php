<?php
include "includes/getBlog.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sass/app.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-primary ">
        <div class="container">
            <div class="navbar-brand d-flex align-items-center">
                <a href="#"><img src="images/momi.png" alt="" class="img_size2"></a>
                <h4>NHMH Blog</h4>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="blogs">Hospital Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="pad"></div>

    <main class="bg-white">
        <div class="container">
            <div class="row mx-0">
                <div class="bg-white col-lg-8  ">
                    <h2><?= $sql_array['post_title'] ?></h2>
                    <p class="text-muted"><?= $sql_array['publish_date'] ?></p>
                    <p>By <?= $sql_array['post_author'] ?></p>

                    <div class="card mx-2 mb-3 bg-light border-0">
                        <img src="images/blog_posts/post<?= $sql_array['post_photo'] ?>" class="card-img-top img_size3">
                        <div class="card-body">
                            <p><?= $sql_array['content'] ?></p>


                        </div>
                    </div>
                </div>
                <div class="bg-white col d-lg-grid  ">
                    <div class="row row-cols-1 justify-content-start gy-0">
                        <div class="col mb-3">
                            <div class="card-header d-flex align-items-center mb-2">
                                <h4>Comments</h4>
                                <button class="ms-auto btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#addComment">Add your Comment</button>
                            </div>
                            <div class="card" id="commentCard">

                                <div class="card-body">
                                    <?php while ($result2 = mysqli_fetch_assoc($sql2)) : ?>
                                        <div class="comment border-bottom">
                                            <div class="comment_msg mb-1"><?= $result2['comment'] ?></div>
                                            <div class="commenter d-flex align-items-center gap-2">
                                                <p class="text-primary"><?= $result2['who_commented'] ?></p>
                                                <small class="text-muted"><?= $result2['comment_date'] ?></small>
                                            </div>
                                        </div>
                                    <?php endwhile ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h4>Related Posts</h4>
                            <div class="row">
                                <?php while ($result1 = mysqli_fetch_assoc($sql1)) : ?>
                                    <a href="nhmhblogpost?post=<?= $result1['post_id'] ?>" target="_blank" class="mx-2 mb-3 bg-light col nav-link">
                                        <div class="card ">
                                            <img src="images/blog_posts/post<?= $result1['post_photo'] ?>" class="card-img-top ">
                                            <div class="card-body">
                                                <p class="card-title"><?= $result1['post_title'] ?></small><br>
                                                    <small><?= $result1['publish_date'] ?></small><br>


                                            </div>
                                        </div>
                                    </a>
                                <?php endwhile ?>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>

    </main>
    <!-- Modal for add comment-->
    <!-- Modal for add comment-->
    <div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signinLabel">New Comment</h1>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="newComment">
                        <div class="bg-danger card p-1 mb-1 text-center text-white" id="errMsg" style="display: none;">
                            <p class="mb-0" id="err">success</p>
                        </div>
                        <div class="bg-success card p-1 mb-1 text-center text-white" id="succMsg" style="display: none;">
                            <p class="mb-0" id="succ">success</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Your Name</label>
                                <input type="text" class="form-control" name="name">
                                <input type="hidden" name="post_id" value="<?= $post_id ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Your comment</label>
                                <textarea class="form-control" name="comment" id="exampleFormControlTextarea2" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary text-white  px-5 w-100" onclick="addComment()" id="addCommentBtn">
                                Add Comment
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-center text-light p-4 text-sm-start">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col pt-3">
                    <h5>New Horizon Maternity Hospital</h5>
                </div>
                <div class="col">
                    <p class="lead">
                        Useful Links
                    </p>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="services" class="nav-link">Hospital Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="blogs" class="nav-link">Hospital Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="contactnhmh" class="nav-link">Contact Hospital</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="javascript/addBlogComment.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <!-- <script src="javascript/login.js"></script> -->
</body>

</html>