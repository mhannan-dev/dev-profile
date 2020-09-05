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
if (isset($_GET['service_delete_id'])) {
    $servc_id = $_GET['service_delete_id'];
    $servc_delete_sql = "DELETE FROM services WHERE id='$servc_id'";
    $delete_selected_service = $db->delete($servc_delete_sql);

    if ($delete_selected_service) {
        echo "<span class='success'>Service deleted successfully</span>";
    } else {
        echo "<span class='error'>Service not deleted!</span>";
    }
}

?>

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Service Table
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               <th>SL.</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Body</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>SL.</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Body</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
<?php
$query = "SELECT * from services ORDER BY id";
$services = $db->select($query);
if ($services) {
    $i = 0;
    while ($result = $services->fetch_assoc()) {
        $i++;
        // print_r($result);

        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
						                        <td><?php echo $result['title']; ?></td>
                                                <td><img src="<?php echo $result['image'] ?>" alt="<?php echo $result['title']; ?>" style="width:80px; height:80px;" ></td>
                                                <td><?php echo $result['descrip']; ?></td>
                                                <td>
                                                    <a href="service_update.php?cat_id=<?php echo $result['id']; ?>"><i class="fas fa-edit"></i></a>&nbsp;
                                                    <a href="?service_delete_id=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure want to delete this item?')"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php
}
}?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include './inc/footer.php';?>
