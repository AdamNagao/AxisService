@extends('layouts.defaultWithSidebar')

@section('content')
  <div class="container">
    <div class="row" >
      <div class="col-md-6 offset-md-2">
        <h1>Create a Order</h1>
        <br></br>
        <div class="row">
          <div class="col">
            <label for="first">First name</label>
            <br></br>

            <label for="last">Last name</label>
            <br></br>

            <label for="description">Service Description</label>
            <br></br>

            <label for="address">Street Address</label>
            <br></br>

            <label for="city">City</label>
            <br></br>

            <label for="state">State</label>
            <br></br>

            <label for="phonenumber">Phone Number</label>
            <br></br>

          </div>

          <div class="col">

          <form action='createorder' method="POST">
            {{csrf_field()}}
            <div class="form-group"> 

              <input type="text" name="first">
              <br></br>


              <input type="text" name="last">
              <br></br>

              <input type="text" name="description">
              <br></br>

              <input type="text" name="address">
              <br></br>

              <input type="text" name="city">
              <br></br>

              <input type="text" name="state">
              <br></br>

              <input type="text" name="phonenumber">

            </div>
            <input class="btn btn-primary btn-lg" type="submit" value="Submit"></input>
          </form>
          </div>
        </div>

      </div>
   </div>
</div>
     
            
@endsection
