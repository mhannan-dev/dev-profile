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
if (isset($_GET['post_delete_id']))
{
    $post_id = $_GET['post_delete_id'];
    $post_delete_sql = "DELETE FROM tbl_post WHERE id='$post_id'";
    $delete_selected_post = $db->delete($post_delete_sql);

    if ($delete_selected_post)
    {
        echo "<span class='success'>Post deleted successfully</span>";
    }
    else
    {
        echo "<span class='error'>Post not deleted successfully</span>";
    }
}

?>

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Post Table
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                              <th>SL.</th>
                                              <th>Title</th>
                                              <th>Body</th>
                                              <th>Category</th>
                                              <th>Author</th>
                                              <th>Image</th>
                                              <th>Date</th>
                                              <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                          <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                          </tr>
                                        </tfoot>
                                        <tbody>
                                          <?php
$query = "SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ORDER BY tbl_post.title DESC";
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
						                                    <td><?php echo $result['title']; ?></td>
                                                <td><?php echo $result['body']; ?></td>
                                                <td><?php echo $result['name']; ?></td>
                                                <td><?php echo $result['author']; ?></td>
                                                <td><img src="https://picsum.photos/200/300/?blur" height="50px; width:50px;"></td>
							                                  <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                <td>
                                                    <a href="post_view.php?post_id=<?php echo $result['id']; ?>"><i class="fas fa-eye"></i></a>&nbsp;
                                                    <a href="post_update.php?post_id=<?php echo $result['id']; ?>"><i class="fas fa-edit"></i></a>&nbsp;
                                                    <a href="?post_delete_id=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure want to delete this item?')"><i class="fas fa-trash-alt"></i></a>
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
