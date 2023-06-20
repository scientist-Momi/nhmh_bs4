<?php
include "includes/header2.php";
include "includes/blogs.php";
?>

<!-- main section -->
<section class="bg-white text-dark py-4">
    <div class="container overflow-hidden">
        <h4 class="mb-3">PREGNANCY BLOG</h4>

        <div class="row justify-content-between">
            <?php while ($result = mysqli_fetch_assoc($sql)) {

                $postID = $result['post_id'];
                $sql1 = mysqli_query($conn, "select * from nhmh_posts_comment_db where post_id = '$postID '");
                $comcount = mysqli_num_rows($sql1);

                $sql7 = mysqli_query($conn, "select * from nhmh_blog_visits_db where post_id = ' $postID ' ");
                $viewcount = mysqli_num_rows($sql7);

            ?>
                <a href="nhmhblogpost?post=<?= $result['post_id'] ?>" target="_blank" class="nav-link col-lg-6 col-sm-12">
                    <div class="card mx-2 mb-3 bg-light">
                        <img src="images/blog_posts/post<?= $result['post_photo'] ?>" class="card-img-top img_size3">
                        <div class="card-body">
                            <h5 class="card-title"><?= $result['post_title'] ?></h5>
                            <p>By <?= $result['post_author'] ?></p>
                            <small><?= $result['publish_date'] ?></small><br>
                            <div class="d-flex align-items-center gap-2">
                                <div class="d-flex">
                                    <span class="material-icons-sharp text-primary">
                                        visibility
                                    </span>
                                    <p><?= $viewcount ?></p>

                                </div>
                                <div class="d-flex">
                                    <span class="material-icons-sharp text-primary">
                                        mode_comment
                                    </span>
                                    <p><?= $comcount ?></p>

                                </div>
                            </div>

                        </div>
                    </div>

                </a>

            <?php } ?>
        </div>

    </div>
</section>
<!-- main section -->


<?php
include "includes/footer.php";
?>