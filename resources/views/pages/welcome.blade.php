@extends('layouts.default')
@section('head')
<!-- Custom fonts for this template -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<!-- Custom styles for this template -->
<link href="css/landing-page.css" rel="stylesheet">
@endsection
@section('content')
<!-- Masthead -->
<header class="masthead text-white text-center">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Axis Service</h1>
            <h3>Contact Eddy at (818)-635-8715<h3>
            <h3>Contact George at (818)787-3339</h3>
            <br>
            <h4>Looking to get some work done? Or want to do some work?</h4>
            <br></br>
         </div>
         <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <div class="btn-group btn-group-lg" role="group" aria-label="...">
               <a class="btn btn-primary btn-lg" href="register" role="button">Become a Client</a>
               <a class="btn btn-primary btn-lg" href="registerPro" role="button">Become a Pro</a>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
   <div class="container">
      <div class="row">
         <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
               <div class="features-icons-icon d-flex">
                  <i class="icon-screen-desktop m-auto text-primary"></i>
               </div>
               <h3>Service Guaranteed</h3>
               <p class="lead mb-0">All work comes with 100% Satisfaction guaranteed!</p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
               <div class="features-icons-icon d-flex">
                  <i class="icon-layers m-auto text-primary"></i>
               </div>
               <h3>Manufacter Warranty</h3>
               <p class="lead mb-0">Many parts come with exentsive warranties</p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
               <div class="features-icons-icon d-flex">
                  <i class="icon-check m-auto text-primary"></i>
               </div>
               <h3>Easy to Use</h3>
               <p class="lead mb-0">A quick sign up, and get work done!</p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Image Showcases -->
<section class="showcase">
   <div class="container-fluid p-0">
      <div class="row no-gutters">
         <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
         <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Select the work you need done</h2>
            <p class="lead mb-0">Choose what services you need completed</p>
         </div>
      </div>
      <div class="row no-gutters">
         <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
         <div class="col-lg-6 my-auto showcase-text">
            <h2>Match with a contractor</h2>
            <p class="lead mb-0">View contractors, read reviews, and view pricing</p>
         </div>
      </div>
      <div class="row no-gutters">
         <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
         <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Get the Job Done</h2>
            <p class="lead mb-0">The contractor completes the job, and you have the peace of mind of 100% satisfaction guaranteed</p>
         </div>
      </div>
   </div>
</section>
<!-- Testimonials -->
<section class="testimonials text-center bg-light">
   <div class="container">
      <h2 class="mb-5">What people are saying...</h2>
      <div class="row">
         <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
               <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
               <h5>Margaret E.</h5>
               <p class="font-weight-light mb-0">"The one stop shop for all my repair needs"</p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
               <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
               <h5>Fred S.</h5>
               <p class="font-weight-light mb-0">"Easy to use, easy to get work done!"</p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
               <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
               <h5>Sarah W.</h5>
               <p class="font-weight-light mb-0">"I can view all contractor prices in one place!"</p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Call to Action -->
<section class="call-to-action text-white text-center">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-xl-9 mx-auto">
            <h2 class="mb-4">Ready to get started? Sign up now!</h2>
         </div>
         <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form>
               <div class="form-row">
                  <div class="col-12 col-md-9 mb-2 mb-md-0">
                     <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
                  </div>
                  <div class="col-12 col-md-3">
                     <a class="btn btn-primary btn-lg" href="register" role="button">Sign up!</a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- Footer -->
<footer class="footer bg-light">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
               <li class="list-inline-item">
                  <a href="/AxisService/public/about">About</a>
               </li>
               <li class="list-inline-item">&sdot;</li>
               <li class="list-inline-item">
                  <a href="/AxisService/public/contact">Contact</a>
               </li>
               <li class="list-inline-item">&sdot;</li>
               <li class="list-inline-item">
                  <a href="#">Terms of Use</a>
               </li>
               <li class="list-inline-item">&sdot;</li>
               <li class="list-inline-item">
                  <a href="#">Privacy Policy</a>
               </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; Axis Home Improvement 2018. All Rights Reserved.</p>
         </div>
         <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
               <li class="list-inline-item mr-3">
                  <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                  </a>
               </li>
               <li class="list-inline-item mr-3">
                  <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</footer>
endsection