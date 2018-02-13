@extends('layouts.default')
@section('head')
<link href="css/about.css" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container" style="margin-top: 8%">

      <!-- Introduction Row -->
      <h1 class="my-4">About Us</h1>
      <p>Our goal is to develop a one stop shop for any home repair or home service needs. We hope to provide easy of use and 100% satisfaction</p>

      <!-- Team Members Row -->
      <div class="row">
        <div class="col-lg-12">
          <h2 class="my-4">Our Team</h2>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="http://placehold.it/200x200" alt="">
          <h3>Eddy
            <small>Owner/Founder</small>
          </h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="http://placehold.it/200x200" alt="">
          <h3>Robert
            <small>General Manager</small>
          </h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="rounded-circle img-fluid d-block mx-auto" src="http://placehold.it/200x200" alt="">
          <h3>Adam
            <small>Web Developer</small>
          </h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
        </div>
      </div>
    </div>
    <!-- /.container -->
  @endsection