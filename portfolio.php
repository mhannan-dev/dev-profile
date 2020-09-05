<?php include './inc/header.php'?>



<div class="main-wrapper">

    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
				<?php
$query = "SELECT * from portfolio ORDER BY id";
$services = $db->select($query);
if ($services) {
    $i = 0;
    while ($result = $services->fetch_assoc()) {
        $i++;
        //print_r($result);?>
                            <div class="item mb-5">
                                <div class="media">

                                    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="sadmin/<?php echo $result['image'] ?>" alt="image">
                                    <div class="media-body">
                                        <h3 class="title mb-1">
                                          <a href="blog-post.php?id=<?php echo $result['id'] ?>"><?php echo $result['name'] ?></a></h3>
                                        <div class="meta mb-1">
                                            <span class="date"><?php echo $fm->formatDate($result['date']); ?></span>
                                            
                                            
                                        </div>
                                        <div class="intro">
                                            <?php echo $fm->textShorten($result['descrip'], 250) ?>
                                        </div>
                                        <a target="_blank" class="more-link" href="blog-post.php"><?php echo $result['url'] ?></a>
                                    </div><!--//media-body-->
                                </div><!--//media-->
                            </div><!--//item-->
							<?php }}?>
</div>
<?php include './inc/project-side.php';?>
            <!---->
            </div>
            <!-- Pagination -->
        </div>
    </section>
<?php include './inc/footer-text.php'?>
</div><!--//main-wrapper-->
<?php include './inc/script-foo.php';?>
