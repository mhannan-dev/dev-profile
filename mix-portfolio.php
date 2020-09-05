<?php include './inc/header.php' ?>

    <div class="main-wrapper">
      <!-- Portfolio section  -->
   <section class="portfolio">
     <div class="row ">
       <div class="portfolio-text">
         <h2>My Portfolio</h2>
         <p class="little-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
       </div>


     </div>
     <div class="row">
       <div class="items">
        <a class="btn btn-warning" type="button" data-filter="all">All</a>
        <a class="btn btn-info" href="" type="button" data-filter=".php">PHP</a>
        <a class="btn btn-success" href="" type="button" data-filter=".js">Javacsript</a>
        <a class="btn btn-dark" type="button" data-filter=".html">HTML</a>
       </div>
     </div>
     <div class="row gallery-container">
       <div class="col-md-6 mix  html php">
         <img src="https://cdn3.wpbeginner.com/wp-content/uploads/2016/02/pickupimage.jpg" alt="">
         <h4>Isometric Perspective Mock-Up</h4>
       </div>

       <div class="col-md-6 mix php">
         <img src="https://dummyimage.com/500x400/000/fff.jpg" alt="">
         <h4>Isometric Perspective Mock-Up</h4>
       </div>
       <div class="col-md-6 mix js">
         <img src="https://dummyimage.com/500x400/000/fff.jpg" alt="">
         <h4>Isometric Perspective Mock-Up</h4>
       </div>

       <div class="col-md-6 mix php">
         <img src="https://dummyimage.com/500x400/000/fff.jpg" alt="">
         <h4>Isometric Perspective Mock-Up</h4>
       </div>
     </div>

   </section>
  <!-- Portfolio section end -->

<?php include './inc/footer-text.php' ?>

</div><!--//main-wrapper-->


<?php include './inc/script-foo.php' ?>
