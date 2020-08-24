<?php include './inc/header.php' ?>
<?php
    $cat_post = mysqli_real_escape_string ($db->link, $_GET['cat_post']);
    if (!isset($cat_post) || $cat_post == NULL) {
        header("Location:404.php");
    } else{
        $id = $_GET['cat_post'];
    }

?>


<div class="main-wrapper">

    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
<?php
        $query = "SELECT * FROM tbl_post WHERE cat='$id' ";
        $post = $db->select($query);
        if ($post) {
            while ($result = $post->fetch_assoc()) {
                ?>

                            <div class="item mb-5">
                                <div class="media">
                                    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-1.jpg" alt="image">
                                    <div class="media-body">
                                        <h3 class="title mb-1"><a href="blog-post.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></h3>
                                        <div class="meta mb-1">
                                            <span class="date">Published 2 days ago</span>
                                            <span class="time"><?php echo $result['author'] ?></span>
                                            <a class="more-link"><?php echo $result['tags'] ?></a>

                                        </div>
                                        <div class="intro">
        <?php echo $fm->textShorten($result['body'], 250) ?>
                                        </div>
                                        <a class="more-link" href="blog-post.php">Read more &rarr;</a>
                                    </div><!--//media-body-->
                                </div><!--//media-->
                            </div><!--//item-->


    <?php }
} else { ?>
                        <p>Your search query not found !!.</p>  
                    <?php } ?>
                </div>
                <?php include './inc/sidebar.php'; ?>

                <!--                        
                -->
            </div>
            <!-- Pagination -->

        </div>
    </section>


    <?php include './inc/footer-text.php' ?>

</div><!--//main-wrapper-->



<?php include './inc/script-foo.php'; ?>