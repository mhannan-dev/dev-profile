<?php
include './config/config.php';
?>
<?php include './lib/Database.php'; ?>
<?php include './helpers/Format.php'; ?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>

<?php
$db = new Database();
$fm = new Format();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Muhammad Hannan &nbsp;Web Developer &nbsp; Digital Marketer</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Blog Template">
        <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
        <link rel="shortcut icon" href="favicon.ico">

        <!-- FontAwesome JS-->
        <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
        <!-- Theme CSS -->
        <link id="theme-style" rel="stylesheet" href="assets/css/theme-1.css">
        <link id="theme-style" rel="stylesheet" href="assets/css/newCascadeStyleSheet.css">
    </head>

    <body>

        <header class="header text-center">
            <h1 class="blog-name pt-lg-4 mb-0"><a href="index.php">Mohammad Hannan</a></h1>

            <nav class="navbar navbar-expand-lg navbar-dark" >

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navigation" class="collapse navbar-collapse flex-column" >
                    <div class="profile-section pt-3 pt-lg-0">
                        <img class="profile-image mb-3 rounded-circle mx-auto" src="assets/images/53276.jpg" alt="image" >

                        <div class="bio mb-3">Hi, my name is Muhammad Hannan. Freelance Web Developer<br><a href="about.php">Find out more about me</a></div><!--//bio-->
                        <ul class="social-list list-inline py-3 mx-auto">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-github-alt fa-fw"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-fw"></i></a></li>
                        </ul><!--//social-list-->
                        <div class="my-2 my-md-3">
                        <form class="signup-form form-inline justify-content-center pt-3" action="search.php" method="get">
                            <div class="form-group">

                                <input type="text" id="ssearcg" name="search" class="form-control mr-md-1 semail" placeholder="Searh here...">
                            </div>

                        </form>
                    </div>
                        <hr>
                    </div><!--//profile-section-->

                    <ul class="navbar-nav flex-column text-left">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"><i class="fas fa-home fa-fw mr-2"></i>Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="what-do.php"><i class="fas fa-tools fa-fw mr-2"></i>What we do</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="portfolio.php"><i class="fas fa-code fa-fw mr-2"></i>Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php"><i class="fas fa-address-card fa-fw mr-2"></i>About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php"><i class="fas fa-envelope fa-fw mr-2"></i>Contact</a>
                        </li>
                    </ul>
                    <div class="my-2 my-md-3">
                        <form class="signup-form form-inline justify-content-center pt-3" action="search.php" method="get">
                            <div class="form-group">

                                <input type="text" id="ssearcg" name="search" class="form-control mr-md-1 semail" placeholder="Searh here...">
                            </div>
                            
                        </form>
                    </div>


                </div>
            </nav>
        </header>
