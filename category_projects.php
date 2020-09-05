<?php include './inc/header.php' ?>
<?php
    $category_project = mysqli_real_escape_string ($db->link, $_GET['category_project']);
    if (!isset($category_project) || $category_project == NULL) {
        header("Location:404.php");
    } else{
        $id = $_GET['category_project'];
    }

?>


<div class="main-wrapper">

    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
<?php
        $query = "SELECT * FROM portfolio WHERE id='$id' ";
        $post = $db->select($query);
        if ($post) {
            while ($result = $post->fetch_assoc()) {
                ?>

                            <div class="item mb-5">
                                <div class="media">
                                    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-1.jpg" alt="image">
                                    <div class="media-body">
                                        <h3 class="title mb-1"><?php echo $result['name'] ?></h3>
                                        <div class="meta mb-1">
                                            <span class="date">Published 2 days ago</span>

                                        </div>
                                        <div class="intro">
                                        <?php echo $fm->textShorten($result['descrip'], 100) ?>
                                        </div>
                                       
                                    </div><!--//media-body-->
                                </div><!--//media-->
                            </div><!--//item-->


    <?php }
} else { ?>
                        <p>Your search query not found !!.</p>  
                    <?php } ?>
                </div>
                <?php include './inc/project-side.php'; ?>

                <!--                        
                -->
            </div>
            <!-- Pagination -->

        </div>
    </section>


    <?php include './inc/footer-text.php' ?>

</div><!--//main-wrapper-->



<?php include './inc/script-foo.php'; ?>