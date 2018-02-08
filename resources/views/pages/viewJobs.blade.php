@extends('layouts.defaultWithSidebar')
@section('head')
<link href="css/home.css" rel="stylesheet">
@endsection
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
            <div class="card-block">
               <form action='acceptJob/{{$order->id}}' method="POST">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <input class="btn btn-primary" type="submit" value="Accept Job"></input>
               </form>
            </div>
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