<?php
include './inc/header.php';
include './inc/sidebar.php';
?><div id="layoutSidenav_content">
                <main>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Post</h3></div>
                                <div class="card-body">
                                  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
    $userid = mysqli_real_escape_string($db->link, $_POST['userid']);

    // Image upload
    $permited = array(
        'jpg',
        'jpeg',
        'png',
        'gif'
    );
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()) , 0, 10) . '.' . $file_ext;
    $uploaded_image = "upload/" . $unique_image;
    //Image upload
    if ($title == "" || $cat == "" || $body == ""  || $author == "" || $file_name == "" || $tags == "" || $userid == "")
    {
        echo "<span class='error'>Field must not be empty</span>";
    }
    elseif ($file_size > 1048567)
    {
        echo "<span class='error'>Image Size should be less then 1MB!</span>";
    }
    elseif (in_array($file_ext, $permited) === false)
    {
        echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
    }
    else
    {
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "INSERT INTO tbl_post(cat,title,body,image,author,tags,userid)
                            VALUES('$cat','$title','$body','$uploaded_image','$author','$tags','$userid')";
        $inserted_rows = $db->insert($query);
        #print_r($inserted_rows);
        if ($inserted_rows)
        {
            echo "<script>window.location = 'post_list.php';</script>";
        }
        else
        {
            echo "<span class='error'>Post not inserted successfully.</span>";
        }
    }
}
?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-md-6">

                                              <div class="form-group">
                                                  <label class="small mb-1">Author</label>
                                                  <input type="text" value="<?php echo Session::get('userName');?>"  name="author" class="form-control py-2"/>
                                                  <input type="hidden" value="<?php echo Session::get('userId');?>"  name="userid" class="medium"/>
                                              </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="small mb-1">Category</label>

                                                    <select class="form-control py-2" id="select" name="cat">
                                <?php
$query = "SELECT * FROM tbl_category";
$category = $db->select($query);
if ($category)
{
    while ($result = $category->fetch_assoc())
    {
?>
                                            <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                        <?php
    }
} ?>
                                </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="seoTags">SEO Related Tags</label>
                                            <input class="form-control py-2" name="tags" type="text" placeholder="SEO Related Tags">
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1">Title</label>
                                            <input class="form-control py-2" name="title" type="text" placeholder="Enter title">
                                        </div>

                                        <div class="form-group">
                                            <label>Body Content</label>
                                            <textarea class="form-control tinymce" id="mytextarea" name="body" rows="8"></textarea>
                                        </div>
                                        <div class="form-group">

                                            <div class="custom-file">

                                                <input  name="image" type="file"/>


                                            </div>
                                        </div>

                                        <div class="form-group mt-4 mb-0">

                                            <button type="text" name="submit" class="btn btn-success btn-block">Save</button>

                                          </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </main>
<?php include './inc/footer.php'; ?>
