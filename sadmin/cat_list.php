<?php
include './inc/header.php';
include './inc/sidebar.php';
?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
if (isset($_GET['cat_delete_id']))
{
    $cat_id = $_GET['cat_delete_id'];
    $cat_delete_sql = "DELETE FROM tbl_category WHERE id='$cat_id'";
    $delete_selected_cat = $db->delete($cat_delete_sql);

    if ($delete_selected_cat)
    {
        echo "<span class='success'>Category deleted successfully</span>";
    }
    else
    {
        echo "<span class='error'>Category not deleted successfully</span>";
    }
}

?>

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Category Table
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               <th>SL.</th>
                                                <th>Title</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>SL.</th>
                                                <th>Title</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
<?php
$query = "SELECT * from tbl_category ORDER BY id";
$category = $db->select($query);
if ($category)
{
    $i = 0;
    while ($result = $category->fetch_assoc())
    {
        $i++;
        #print_r($result);

?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
						<td><?php echo $result['name']; ?></td>
                                                <td>
                                                    <a href="cat_update.php?cat_id=<?php echo $result['id']; ?>"><i class="fas fa-edit"></i></a>&nbsp;
                                                    <a href="?cat_delete_id=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure want to delete this item?')"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php
    }
} ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include './inc/footer.php'; ?>
