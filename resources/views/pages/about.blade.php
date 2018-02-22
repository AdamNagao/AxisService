@extends('layouts.default')
@section('head')
<link href="css/about.css" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container" style="margin-top: 8%">

      <!-- Introduction Row -->
      <h1 class="my-4">About Us</h1>
      <p>Our goal is to develop a one stop shop for any home repair or home service needs. We hope to provide easy of use and 100% satisfaction. Simply sign up as either a pro or a user. Pros provide goods and services to clients while clients can browse reviews, submit reviews, get quotes, and pay invoices.</p>

      <h2>Here is a list of our services</h2>
      <br>
      @php

      /* Attempt MySQL server connection. Assuming you are running MySQL
      server with default setting (user 'root' with no password) */

      $mysqli = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));
 
      // Check connection
      if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
      }
 
      // Attempt select query execution
      $sql = "SELECT * FROM services WHERE id='1' ";

      if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){
          while($row = $result->fetch_array()){

            $services = $row['name'];

            $array = explode(',', $services); //break the list on commas

            $size = count($array); //find total size of array

            $size /= 3;   //number of items per col

            echo "<div class='row'>";
            for($i = 0; $i <= 3;$i++){
              echo "<div class='col'>";
              //make a new col
              for ($j = 0; $j <= $size; $j++) {
                echo "<p> $array[$j] </p>";
              } 
              echo "</div>";
            }
            echo "</div>";
                                            

          
          }
          // Free result set
          $result->free();
        } else{
          echo "No records matching your query were found.";
        }
      } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
      }
 
      // Close connection
      $mysqli->close();
      
      @endphp

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