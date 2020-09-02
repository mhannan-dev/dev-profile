<?php
include './inc/header.php';
include './inc/sidebar.php';
?><div id="layoutSidenav_content">
                <main>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Service</h3></div>
                                <div class="card-body">
                                  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
  

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
    if ($title == "" ||  $body == "" || $file_name == "" || $tags == "")
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
        $query = "INSERT INTO services(title,body,image,tags)
                            VALUES('$title','$body','$uploaded_image','$tags')";
        $inserted_rows = $db->insert($query);
        #print_r($inserted_rows);
        if ($inserted_rows)
        {
            echo "<script>window.location = 'service_list.php';</script>";
        }
        else
        {
            echo "<span class='error'>Service not inserted successfully.</span>";
        }
    }
}
?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        

                                        <div class="form-group">
                                            <label class="small mb-1" for="seoTags">SEO Related Tags</label>
                                            <input class="form-control py-2" name="tags" type="text" placeholder="SEO Related Tags">
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1">Name of service</label>
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
