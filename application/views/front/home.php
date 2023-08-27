<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css');?>" >

    <link rel="stylesheet" href="<?php echo base_url('public/css/style.css');?>" >

    <title>Codeigniter Web Application</title>
  </head>
  <body>
  <header class="bg-light">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light pt-3 pb-3">
        <a class="navbar-brand" href="<?php echo base_url();?>">Codeigniter Web Application</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse right-align" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url();?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Abouts Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo base_url('public/images/slide001');?>" class="d-block w-100" alt="">
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url('public/images/slide2');?>" class="d-block w-100" alt="">
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url('public/images/slide3');?>" class="d-block w-100" alt="">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container pt-4 pb-4">
    <h3 class="pb-3">About Company</h3>

    <p class="text-muted">Welcome to Codeigniter Application Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>

    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
  </div>

  <div class="bg-light pb-4">
    <div class="container bg-light">
        <h3 class="pb-3 pt-4">OUR SERVICES</h3>
        <div class="row">
            <div class="col-md-3">
                <div class="card h-100" >
                    <img src="<?php echo base_url('public/images/box01');?>" class="card-img-top" alt="">
                      <div class="card-body">
                          <h5 class="card-title">Website Devlopment</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card h-100">
                    <img src="<?php echo base_url('public/images/box2');?>" class="card-img-top" alt="">
                      <div class="card-body">
                          <h5 class="card-title">Learn & Parctice</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card h-100">
                    <img src="<?php echo base_url('public/images/box3');?>" class="card-img-top" alt="">
                      <div class="card-body">
                          <h5 class="card-title">AI tools</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card h-100">
                    <img src="<?php echo base_url('public/images/box4');?>" class="card-img-top" alt="">
                      <div class="card-body">
                          <h5 class="card-title">Full Stack Developer</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="pb-4 pt-4">
      <div class="container">
          <h3 class="pb-3 pt-4">LATEST BLOGS</h3>
          <div class="row">
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="<?php echo base_url('public/images/box01');?>" class="card-img-top" alt="">
                      <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card h-100">
                    <img src="<?php echo base_url('public/images/box2');?>" class="card-img-top" alt="">
                      <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card h-100">
                    <img src="<?php echo base_url('public/images/box3');?>" class="card-img-top" alt="">
                      <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card h-100" >
                    <img src="<?php echo base_url('public/images/box4');?>" class="card-img-top" alt="">
                      <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                </div>
            </div>
        </div>
      </div>    
  </div>

  <footer class="bg-light pt-5 pb-4 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
            <h5>LOGO</h5>
            <small class="text-muted">
              <strong>Company inc.</strong><br>
              Magebuddy Commerce
              M401, Shri Mahagnaesh Nagari,
              Mundhawa Pune 411037, India<br>
              phone:8080082398<br>
              ajinkyakamble865@gmail.com
            </small>
        </div>
        <div class="col-md-3">
            <h5>Important Links</h5>

            <ul class="list-unstyled text-small">
              <li><a href="#" class="text-muted">About Us</a></li>
              <li><a href="#" class="text-muted">Services</a></li>
              <li><a href="#" class="text-muted">Blog</a></li>
              <li><a href="#" class="text-muted">Categories</a></li>
              
            </ul>
          
        </div>
        <div class="col-md-3">
            <h5>My Account</h5>

            <ul class="list-unstyled text-small">
              <li><a href="#" class="text-muted">Login</a></li>
              <li><a href="#" class="text-muted">Register</a></li>
              <li><a href="#" class="text-muted">My Articles</a></li>              
            </ul>
        </div>
        <div class="col-md-3">
            <h5>Support</h5>

            <ul class="list-unstyled text-small">
              <li><a href="#" class="text-muted">Contact Us</a></li>
            </ul>
          
        </div>
      </div>
    </div>
  </footer>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="<?php echo base_url('public/js/jquery-3.5.1.slim.min.js');?>" ></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js');?>" ></script>

  
  </body>
</html>