@extends('layouts.default')

@section('head')
    <link href="css/home.css" rel="stylesheet">
@endsection

@section('content')
  <div class="container">
    <div class="row" >
      <div class="col-xs-3 col-sm-3 col-md-3"></div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <h1>Create a Order</h1>

          <form action='createorder' method="POST">
            {{csrf_field()}}
            <div class="form-group"> 

              <label for="first">First name</label>
              <input type="text" name="first">
              <br><br\>

              <label for="last">Last name</label>
              <input type="text" name="last">
              <br><br\>

              <label for="description">Service Description</label>
              <input type="text" name="description">
              <br><br\>

              <label for="address">Street Address</label>
              <input type="text" name="address">
              <br><br\>

              <label for="city">City</label>
              <input type="text" name="city">
              <br><br\>

              <label for="state">State</label>
              <input type="text" name="state">
              <br><br\>

              <label for="phonenumber">Phone Number</label>
              <input type="text" name="phonenumber">
            </div>
            <input class="btn btn-primary" type="submit" value="Submit"></input>
          </form>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3"></div>
   </div>
</div>
     
            
@endsection

@section('foot')

@endsection