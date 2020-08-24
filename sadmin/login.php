<?php
include '../lib/Session.php';
Session::checkLogin();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php
$db = new Database();
$fm = new Format();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">

<?php
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            $username = $fm->validation($_POST['username']);
                                            $password = $fm->validation(md5($_POST['password']));
                                            #$role = $fm->validation($_POST['role']);
                                            $username = mysqli_real_escape_string($db->link, $username);
                                            $password = mysqli_real_escape_string($db->link, $password);

                                            $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";

                                            $result = $db->select($query);
                                            if ($result != false) {
                                                #$value = mysqli_fetch_array($result);
                                                $value = mysqli_fetch_assoc($result);
                                                print_r($value);
                                                $row = mysqli_num_rows($result);
                                                if ($row > 0) {
                                                    Session::set("login", true);
                                                    Session::set("username", $value['username']);
                                                    Session::set("userId", $value['id']);
                                                    #Session::set("userRole", $value['role']);
                                                    header("Location:index.php");
                                                } else {
                                                    echo "<span style='error'>No result found..!!</span>";
                                                }
                                            } else {
                                                echo "<span style='color:red; font-size:18px;'>Username or Password not match</span>";
                                            }
                                        }
?>
                                        <form action="login.php" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                                <input class="form-control py-4" id="inputUsername" type="text" placeholder="Enter username" required="" name="username"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" required="" name="password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                
                                                <input class="btn btn-primary" type="submit" name="login" value="Log in" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
