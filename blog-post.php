<?php include './inc/header.php' ?>
<?php
$post_id = mysqli_real_escape_string($db->link, $_GET['id']);
if (!isset($post_id) || $post_id == NULL) {
    header("Location:404.php");
} else {
    $post_id = $post_id;
}
?>

<div class="main-wrapper">

    <article class="blog-post px-3 py-5 p-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $query = "select * from tbl_post where id=$post_id";
                    $post = $db->select($query);
                    if ($post) {
                        while ($result = $post->fetch_assoc()) {
                            #print_r($result);
                            ?>
                            <header class="blog-post-header">
                                <h2 class="title mb-2"><?php echo $result['title'] ?></h2>
                                <div class="meta mb-1">
                                    <span class="date"><?php echo $fm->formatDate($result['date']); ?></span>
                                    <span class="time">By <?php echo $result['author'] ?></span>

                            </header>

                            <div class="blog-post-body">
                                <figure class="blog-banner">
                                    <a href="https://made4dev.com">
                                        <img class="img-fluid" src="assets/images/blog/blog-post-banner.jpg" alt="image"></a>

                                </figure>
                                <?php echo $result['body'] ?>
                            </div>
                            <?php
                        }
                    } else {
                        header('Location:404.php');
                    }
                    ?>

                </div>
               


            </div>

            <div class="blog-comments-section">
                Add discuss comments here
            </div><!--//blog-comments-section-->

        </div><!--//container-->
    </article>



    <?php include './inc/footer-text.php' ?>

</div><!--//main-wrapper-->



<?php include './inc/script-foo.php' ?>