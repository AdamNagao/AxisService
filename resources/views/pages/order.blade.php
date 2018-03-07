@extends('layouts.defaultWithSidebar')

@section('content')
  <div class="container">
    <div class="row" >
      <div class="col offset-md-2">
        <h1>Create a Order</h1>
        <br></br>
        <div class="row">
          <div class="col">
            <form action='createorder' method="POST">
            {{csrf_field()}}
            <div class="form-group"> 
            <label for="first">First name</label>
            <input type="text" name="first" value="{{Auth::user()->first}}">


            <label for="last">Last name</label>
            <input type="text" name="last" value="{{Auth::user()->last}}">
            <br></br>

            <label for="description">Service Description</label>
            <input type="text" name="description">
            <br></br>

            <label for="address">Street Address</label>
            <input type="text" name="address" value="{{Auth::user()->address}}">
            <br></br>

            <label for="city">City</label>
            <input type="text" name="city" value="{{Auth::user()->city}}">
            <br></br>

            <label for="state">State</label>
            <input type="text" name="state" value="{{Auth::user()->state}}">
            <br></br>

            <label for="phonenumber">Phone Number</label>
            <input type="text" name="phonenumber" value="{{Auth::user()->phonenumber}}">
            <br></br>

          </div>
            <input class="btn btn-primary btn-lg" type="submit" value="Submit"></input>
          </form>
          </div>
        </div>

      </div>
   </div>
</div>
     
            
@endsection
