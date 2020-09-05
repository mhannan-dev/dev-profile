<div class="col-md-4 text-left">
                    <div class="cr-post">
                        <h4>Project Classification</h4>
                        <ul>

                            <?php
$cat_query = "SELECT * FROM `category`";
$cat_post = $db->select($cat_query);
if ($cat_post) {
    while ($cat_pst_result = $cat_post->fetch_assoc()) {
        //print_r ($cat_pst_result);
        ?>
                
                    <li><a href="category_projects.php?category_project=<?php echo $cat_pst_result['category_id'] ?>"><?php echo $cat_pst_result['category_name'] ?></a></li>
                                <?php
}
} else {
    ?>
                                <li>No Category Created</li>
<?php }?>
                        </ul>
                    </div>

                    <div class="cr-post">
                        <h4>Recent Post</h4>
                        <ul>
                            <?php
$query = "select * from tbl_post limit 5";
$post = $db->select($query);
if ($post) {
    while ($result = $post->fetch_assoc()) {
        ?>

                                    <li><a href="post.php?id=<?php echo $result['id'] ?>"><?php echo $result['title']; ?></a></li>

                            <?php }} else {
    #header('Location:404.php');
    echo "No Post found";
}?>
                        </ul>

                    </div>



                </div>
