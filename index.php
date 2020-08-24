<?php include './inc/header.php' ?>



<div class="main-wrapper">

    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
$per_page = 4;
if (isset($_GET["page"]))
{
    $page = $_GET["page"];
}
else
{
    $page = 1;
}
$start_frm = ($page - 1) * $per_page;
?>

                    <?php
$query = "select * from tbl_post limit $start_frm, $per_page";

$post = $db->select($query);
if ($post)
{
    while ($result = $post->fetch_assoc())
    {
        #print_r($result);

?>

                            <div class="item mb-5">
                                <div class="media">
                                    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="sadmin/<?php echo $result['image'] ?>" alt="image">
                                    <div class="media-body">
                                        <h3 class="title mb-1">
                                          <a href="blog-post.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></h3>
                                        <div class="meta mb-1">
                                            <span class="date"><?php echo $fm->formatDate($result['date']); ?></span>
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


<?php
    } ?>

<?php
    $query = "select * from tbl_post";
    $result = $db->select($query);
    $total_rows = mysqli_num_rows($result);
    $total_pages = ceil($total_rows / $per_page);
    echo "<span class='pagination'><a href='index.php?page=1'>" . 'First Page' . "</li></a>";
    for ($i = 1;$i <= $total_pages;$i++)
    {
        echo "<a href='index.php?page=" . $i . "'>" . $i . "</a>";
    };
    echo "<a href='index.php?page=$total_pages'>" . 'Last Page' . "</a></span>";
?>
<!-- Pagination -->
<?php
}
else
{
    #header('Location:404.php');
    echo "No Post Found";
}
?>
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
