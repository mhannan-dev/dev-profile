<?php include './inc/header.php' ?>
    <div class="main-wrapper">
	    <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">What we do</h2>
		    </div><!--//container-->
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
			<?php
$query = "SELECT * from services ORDER BY id";
$services = $db->select($query);
if ($services) {
    $i = 0;
    while ($result = $services->fetch_assoc()) {
        $i++;
        //print_r($result);
        ?>
			    <div class="item mb-5">
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="sadmin/<?php echo $result['image'] ?>" alt="<?php echo $result['title'] ?>">
					    <div class="media-body">
						    <h3 class="title mb-1">
							<?php echo $result['title'] ?></h3>
						    <div class="meta mb-1"><span class="date">Published <?php echo $fm->formatDate($result['date']); ?></div>
						    <div class="intro"><?php echo $result['descrip'] ?></div>
						    
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
				<?php
}
}?>	
		    </div>
	    </section>
		<?php include './inc/footer-text.php' ?>
    
    </div><!--//main-wrapper-->
<?php include './inc/script-foo.php' ?>