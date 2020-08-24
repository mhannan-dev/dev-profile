<?php
include './inc/header.php';
include './inc/sidebar.php';
?>
<div id="layoutSidenav_content">
                <main>
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
<?php
if (!isset($_GET['cat_id']) || $_GET['cat_id'] == null) {
  echo "<script>window.location = 'cat_list.php';</script>";
} else {
  $id = $_GET['cat_id'];
}

?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $name = $_POST['name'];
 $name = mysqli_real_escape_string($db->link, $name);
 #print_r($name);

 if (empty($name)) {
     echo "<span class='error'>Field must not be empty</span>";
 } else {
     $query = "UPDATE tbl_category SET name='$name' WHERE id='$id'";
     $cat_update = $db->update($query);
     if ($cat_update) {
         #echo "<span class='success'>Category updated successfully</span>";
         echo "<script>window.location = 'cat_list.php';</script>";
     } else {
         echo "<span class='error'>Category not updated successfully</span>";
     }

 }
}
?>
                                <div class="card-header">
                                  <h3 class="text-center font-weight-light my-4">Add Category</h3></div>
                                <div class="card-body">
<?php
$query = "SELECT * FROM tbl_category WHERE id='$id' ORDER BY id DESC";
$category = $db->select($query);
while ($cat_result = $category->fetch_assoc()) {

    #print_r($cat_result);
?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputCategory">Category name</label>
                                            <input name="name" class="form-control py-4" value="<?php echo $cat_result['name'];?>">
                                        </div>
                                        <div class="form-group mt-4 mb-0">
                                            <input class="btn btn-success btn-block" type="submit" name="submit" Value="Save" /></div>
                                    </form>
<?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </main>
<?php include './inc/footer.php'; ?>
