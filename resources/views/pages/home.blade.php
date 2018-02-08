@extends('layouts.defaultWithSidebar')

@section('content')
@if(Auth::check())
<div class="container">
    <div class="row" >
        <div class="col-xs-3 col-sm-3 col-md-2"></div>
        <div class="col-xs-6 col-sm-6 col-md-8">


            @if(Auth::user()->role==0)

            <h2>Welcome {{{auth::user()->first}}}!</h2>
            <br>
            <div>
                <h3>Steps to get your job Done!</h3>
                <br>
                <p>1. Create and order and describe the work that needs to be done!</p>
                <p>2. Pros see your order, and generate quotes for your job</p>
                <p>3. You review Pros, view quotes and select a Pro for the job</p>
                <p>4. Setup a start date with the Pro and get the job done!</p> 
            </div>


            @else

            <h2>Welcome {{{auth::user()->first}}}!</h2>
            <br>
            <div>
                <h3>Steps to find your next job!</h3>
                <br>
                <p>1. View jobs and accept a job that meets your requirements</p>
                <p>2. Generate a quote for the job listing out labor, parts, etc</p>
                <p>3. Get chosen for the job! Users will choose you based on your reviews and price</p>
                <p>4. Contact the user and schedule a date and time for the job to begin</p> 
            </div>


            @endif

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