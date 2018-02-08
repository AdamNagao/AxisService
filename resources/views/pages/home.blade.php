@extends('layouts.default')
@section('head')
<link href="css/home.css" rel="stylesheet">
@endsection
@section('content')
@if(Auth::check())
<div class="container">
    <div class="row" >
        <div class="col-xs-3 col-sm-3 col-md-2"></div>
        <div class="col-xs-6 col-sm-6 col-md-8">

            	<h2>Welcome {{{auth::user()->first}}}!</h2>
            	<br>
            	<div class="">
            		<h3>Steps to get your job Done!</h3>
            		<br>
            		<p>1. Create and order and describe the work that needs to be done!</p>
            		<p>2. Pros see your order, and generate quotes for your job</p>
            		<p>3. You review Pros, view quotes and select a Pro for the job</p>
            		<p>4. Setup a start date with the Pro and get the job done!</p>	



            	</div>

        
        </div>
      <div class="col-xs-3 col-sm-3 col-md-2"></div>
   </div>
</div>
</div>
</div>

@endif       
@endsection
@section('foot')
@endsection