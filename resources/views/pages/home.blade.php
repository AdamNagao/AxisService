@extends('layouts.default')
@section('head')
<link href="css/home.css" rel="stylesheet">
@endsection
@section('content')

<div class="container">
    <div class="row" style="margin-top:10%" >
        <div class="col-xs-3 col-sm-3 col-md-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6">
        	@if(Auth::check())
            	<h2>{{{Auth::user()->first}}}'s Reviews</h2>

         	@endif
        </div>
      <div class="col-xs-3 col-sm-3 col-md-3"></div>
   </div>
</div>
</div>
</div>       
@endsection
@section('foot')
@endsection