<?php
include './inc/header.php';
include './inc/sidebar.php';
?><div id="layoutSidenav_content">
                <main>
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <a class="btn btn-success" href="cat_add.php">+</a> 
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Category</h3></div>
                                <div class="card-body">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name  = $_POST['name'];
    $name = mysqli_real_escape_string($db->link, $name);
    if (empty($name))
    {
        echo "<span class='error'>Field must not be empty</span>";
    }
    else
    {
        $query = "INSERT INTO tbl_category(name) VALUES ('$name')";
        $cat_insert = $db->insert($query);
        #print_r($cat_insert);
        if ($cat_insert)
        {
            echo "<span class='success'>Category inserted successfully</span>";
        }
        else
        {
            echo "<span class='error'>Category not inserted successfully</span>";
        }
    }

}
?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputCategory">Category name</label>
                                            <input name="name" class="form-control py-4" type="text" placeholder="Enter category">
                                        </div>
                                        <div class="form-group mt-4 mb-0">
                                            <input class="btn btn-success btn-block" type="submit" name="submit" Value="Save" /></div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </main>
<?php include './inc/footer.php'; ?>
