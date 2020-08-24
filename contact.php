<?php include './inc/header.php' ?>
    
    <div class="main-wrapper">
	    	    
	    <article class="about-section py-5">
		    <div class="container">
			    <h2 class="title mb-3">Contact Me</h2>
			    
                <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Full name</label>
    <input type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter full name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Subject</label>
    <input type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter Subject">
    
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Send</button>
</form>
			    
			    
			   
			    
			   
		    </div>
	    </article><!--//about-section-->
	    
	    <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">Newsletter</h2>
			    <div class="intro">Welcome to my blog. Subscribe and get my latest blog post in your inbox.</div>
			    <form class="signup-form form-inline justify-content-center pt-3">
                    <div class="form-group">
                        <label class="sr-only" for="semail">Your email</label>
                        <input type="email" id="semail" name="semail1" class="form-control mr-md-1 semail" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
		    </div><!--//container-->
	    </section>
	    
      <?php include './inc/footer-text.php' ?>
    
    </div><!--//main-wrapper-->
    
    
  
<?php include './inc/script-foo.php' ?>