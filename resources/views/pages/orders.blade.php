@extends('layouts.defaultWithSidebar')
@section('head')
<style>
   .height {
      min-height: 200px;
   }

   .icon {
      font-size: 47px;
      color: #5CB85C;
   }

   .iconbig {
      font-size: 77px;
      color: #5CB85C;
   }

   .table > tbody > tr > .emptyrow {
      border-top: none;
   }

   .table > thead > tr > .emptyrow {
      border-bottom: none;
   }

   .table > tbody > tr > .highrow {
      border-top: 3px solid;
   }
</style>

@endsection
@section('content')      
   @if(Auth::check())
      @if(is_null($orders))
         <p>Whoops! You have no orders, go create an order</p>
      @else
         @if(Auth::user()->role==0)
            <h2>{{{Auth::user()->first}}}'s Orders</h2>
            @foreach($orders as $order)
            <div class="container">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="card ">
                        <div class="card-header">
                        <h3 class="text-xs-center"><strong>Order summary</strong></h3>
                           @if($order->active==0)
                              <p>Progress: Completed</p>
                              <p>Completed by (Pro): {{$order->proId}}</p>
                           @else($order->active==1)
                              <p>Progress: Pending</p>
                           @endif
                        <br>
                        <strong>{{$order->first}}, {{$order->last}}:</strong><br>
                        Street Address: {{$order->address}}<br>
                        State: {{$order->state}}<br>
                        Phone Number: {{$order->phonenumber}}<br>
                     </div>
                     <div class="card-block">
                        <div class="table-responsive">
                           <table class="table table-sm">
                              <thead>
                                 <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-xs-center"><strong>Description</strong></td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>AC Repair</td>
                                    <td class="text-xs-center">{{$order->description}}</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>

                     <div class="card-block">
                        <div class="table-responsive">
                           <table class="table table-sm">  
                              <thead>
                                 <tr>
                                    <td><strong>Pro Name</strong></td>
                                    <td><strong>Rating</strong></td>
                                    <td class="text-xs-center"><strong>Actions</strong></td>
                                 </tr>
                              </thead>          
                              @if($order->active>1)
                                 @if($order->proId!="")
                                    @php

                                    $proIdList = $order->proId;
                                    $array = explode(',', $proIdList); //break the list on commas

                                    foreach($array as $value) {

                                       /* Attempt MySQL server connection. Assuming you are running MySQL
                                       server with default setting (user 'root' with no password) */

                                       $mysqli = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));
 
                                       // Check connection
                                       if($mysqli === false){
                                          die("ERROR: Could not connect. " . $mysqli->connect_error);
                                       }
 
                                       // Attempt select query execution
                                       $sql = "SELECT * FROM users WHERE id='$value' ";

                                       if($result = $mysqli->query($sql)){
                                          if($result->num_rows > 0){
                                             while($row = $result->fetch_array()){
                                                echo "<tbody><tr>";

                                                echo "<td>" . $row['first'] . " " . $row['last'] . "</td>";
                                                echo "<td>" . $row['rating'] . " with " . $row['numOfRating'] . " reviews"; 

                                                echo "<td><a href='$value' type='button' class='btn btn-primary'>View Profile</a></td>";

                                                $proId = $row['id'];
                                                $orderId = $order->id;

                                                // Attempt select query execution
                                                $sql2 = "SELECT * FROM products WHERE proId='$proId' AND orderId='$orderId'";

                                                if($result2 = $mysqli->query($sql2)){
                                                   if($result2->num_rows > 0){
                                                      if($order->active>=3){ //check if order has quote by this pro
                                                   
                                                         echo "<td><a href='viewQuote/$order->id/$proId' type='button' class='btn btn-primary'>View Quote</a></td>";
                                                   
                                                      }
                                                   }
                                                } else{
                                                   echo "No records matching your query were found.";
                                                }
                                                //free result set
                                                $result2->free();

                                                if($order->active==3){
                                                   echo "<td><a href='selectPro/$value/$order->id' type='button' class='btn btn-primary'>Select this Pro</a></td>";
                                                   echo "</tr></tbody>";  
                                                }

          
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
                                    }
                                 @endphp
                              @endif
                           @endif

                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <br></br>
         @endforeach 
            @elseif(Auth::user()->role==1)
         <!--Pro user jobs-->
            <div class="container">

            <h2>{{{Auth::user()->first}}}'s Orders</h2>
            @foreach($orders as $order)
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card ">
                        <div class="card-header">
                        <h3 class="text-xs-center"><strong>Order summary</strong></h3>
                           @if($order->active==0)
                              <p>Progress: Completed</p>
                              <p>Completed by (Pro): {{$order->proId}}</p>
                           @else($order->active==1)
                              <p>Progress: Pending</p>
                           @endif
                        <br>
                        <strong>{{$order->first}}, {{$order->last}}:</strong><br>
                        <p>Description: {{$order->description}}</p>
                        <p>Street Address: {{$order->address}}</p>
                        <p>City: {{$order->city}}</p>
                        <p>State: {{$order->state}}</p>
                        <p>Phone Number: {{$order->phonenumber}}</p>
                        <p>Active: {{$order->active}}</p>
                     </div>
                     <div class="card-block">
                        <div class="table-responsive">
                           <table class="table table-sm">
                              <thead>
                                 <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-xs-center"><strong>Description</strong></td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>AC Repair</td>
                                    <td class="text-xs-center">{{$order->description}}</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <a class="btn btn-primary" role="button" href="quote/{{$order->id}}">Generate Quote</a>
                     <a class="btn btn-primary" role="button" href="completeJob/{{$order->id}}">Mark Completed</a>
               
                  </div>
               </div>
            </div>
         </div>
            </div>

                  </div>

               @endforeach 
            @endif
         @endif
      @endif

</div>
@endsection
@section('foot')
@endsection