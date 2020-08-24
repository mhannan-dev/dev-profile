<?php
include './inc/header.php';
include './inc/sidebar.php';
?>
<?php
    if (!isset($_GET['post_id']) || $_GET['post_id'] == null) {
        echo "<script>window.location = 'post_list.php';</script>";
    } else {
        $post_id = $_GET['post_id'];
    }
?>
<div id="layoutSidenav_content">
                <main>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Post</h3></div>
                                <div class="card-body">
                                  <?php
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                  $title = mysqli_real_escape_string($db->link, $_POST['title']);
                  $body = mysqli_real_escape_string($db->link, $_POST['body']);
                  $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
                  $author = mysqli_real_escape_string($db->link, $_POST['author']);
                  $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
                  $userid = mysqli_real_escape_string($db->link, $_POST['userid']);

                  // Image upload
                  $permited = array('jpg', 'jpeg', 'png', 'gif');
                  $file_name = $_FILES['image']['name'];
                  $file_size = $_FILES['image']['size'];
                  $file_temp = $_FILES['image']['tmp_name'];
                  $div = explode('.', $file_name);
                  $file_ext = strtolower(end($div));
                  $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                  $uploaded_image = "upload/" . $unique_image;
                  //Image upload

                  // if ($title == ""||$body == ""||$cat == ""||$author == ""||$file_name == ""||$tags == "") {
                  //     echo "<span class='error'>Field must not be empty</span>";
                  // }
                  if (!empty($file_name)) {

                      if ($file_size > 1048567) {
                          echo "<span class='error'>Image Size should be less then 1MB!
                              </span>";
                      } elseif (in_array($file_ext, $permited) === false) {
                          echo "<span class='error'>You can upload only:-"
                          . implode(', ', $permited) . "</span>";
                      } else {

                          move_uploaded_file($file_temp, $uploaded_image);
                          $query = "UPDATE tbl_post SET
                                  title = '$title',
                                  body = '$body',
                                  cat = '$cat',
                                  author = '$author',
                                  image = '$uploaded_image',
                                  tags = '$tags',
                                  userid = '$userid',

                                  WHERE id='$post_id'
                              ";
                          $updated_rows1 = $db->insert($query);
                          if ($updated_rows1) {
                              echo "<script>window.location = 'post_list.php';</script>";
                          } else {
                              echo "<span class='error'>Post updated successfully.</span>";
                          }
                      } #end else
              } else{
                  $query = "UPDATE tbl_post SET
                          title = '$title',
                          body = '$body',
                          cat = '$cat',
                          author = '$author',
                          tags = '$tags',
                          userid = '$userid'
                          WHERE id='$post_id'
                      ";
                  $update_row = $db->insert($query);
                  if ($update_row) {
                      echo "<script>window.location = 'post_list.php';</script>";
                  } else {
                      echo "<span class='error'>Post updated successfully.</span>";
                  }
              }
          }
  ?>

  <?php
  $query = "SELECT * FROM tbl_post WHERE id='$post_id'";
  $post = $db->select($query);
  while ($post_result = $post->fetch_assoc()) {
      #print_r($post_result);
      ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-md-6">

                                              <div class="form-group">
                                                  <label class="small mb-1">Author</label>
                                                  <input value="<?php echo $post_result['author'];?>" type="text" value="<?php echo Session::get('userName');?>"  name="author" class="form-control py-2"/>
                                                  <input type="hidden" value="<?php echo Session::get('userId');?>"  name="userid" class="medium"/>
                                              </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="small mb-1">Category</label>

                                                    <select id="select" name="cat" class="form-control py-2">
                                  <?php $query = "SELECT * FROM tbl_category";
                                      $category = $db->select($query);
                                      if ($category) {
                                          while ($result = $category->fetch_assoc()) {?>

                                              <option

                                              <?php if ($post_result['cat'] == $result['id']) {?>

                                                  selected="selected"
                                              <?php }?> value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?>

                                              </option>
                                  <?php } }?>


                                  </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="seoTags">SEO Related Tags</label>
                                            <input class="form-control py-2" name="tags" type="text" value="<?php echo $post_result['tags'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1">Title</label>
                                            <input value="<?php echo $post_result['title'];?>" class="form-control py-2" name="title" type="text" placeholder="Enter title">
                                        </div>

                                        <div class="form-group">
                                            <label>Body Content</label>
                                            <textarea class="form-control tinymce" id="mytextarea" name="body" rows="10" cols="40">

                                              <?php echo $post_result['body']; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">

                                            <div class="custom-file">

                                              <img src="<?php echo $post_result['image'] ?>" height="100px; width:100px;"><BR/>
                                              <input  name="image" type="file" class="img-thumbnail"/>


                                            </div>
                                        </div>

                                        <div class="form-group mt-4 mb-0">

                                            <button type="text" name="submit" class="btn btn-success btn-block">Save</button>

                                          </div>
                                    </form>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </main>
<?php include './inc/footer.php'; ?>
