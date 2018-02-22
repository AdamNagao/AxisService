@extends('layouts.defaultWithSidebar')

@section('content')  
@if(Auth::check())   
@foreach($orders as $order) 
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card ">
            <div class="card-header">
               <h3 class="text-xs-center"><strong>Job summary</strong></h3>
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
               @php
                  $proId = Auth::user()->id; //the current pro
                  $proIdList = $order->proId; //the list of signed up pros
                  $array = explode(',', $proIdList); //break the list on commas
                  $proIsSignedUp = false;

                  foreach($array as $value) { //traverse the array to check if the pro has already signed up
                     if($value == $proId){
                        $proIsSignedUp = true;
                     }
                  }  
                  
                  if($proIsSignedUp){

                  } else {
                     echo "<div class='card-block'>";
                     echo "<form action='acceptJob/$order->id' method='POST'>";


                  @endphp

                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  
                  @php                   
                     echo "<input class='btn btn-primary' type='submit' value='Accept Job'></input>";   
                     echo "</form>";
                     echo "</div>";
                  }               
               @endphp
         </div>
      </div>
   </div>
</div>
<br>
@endforeach 
@endif
</div>
</div>
@endsection
@section('foot')
@endsection