<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <link href="css/default.css" rel="stylesheet">
      @yield('head')
      <title>Axis Service</title>
   </head>
   <body>

      <nav class="navbar navbar-inverse bg-inverse fixed-top">
        <div class="container">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <a class="navbar-brand" href="/AxisService/public">Axis Service</a>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
               <li class="nav-item dropdown">
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      @if (Auth::guest())
                        {{--This is a guest user--}}
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>

                      @else

                        @if(Auth::user()->role==0)
                          {{--This is a user--}}
                          <li><a href="/AxisService/public/home">Home</a></li>
                          <li><a href="/AxisService/public/order">Order a new job</a></li>
                          <li><a href="/AxisService/public/orders">Your Orders</a></li>
                          <li><a href="/AxisService/public/profile/{{Auth::user()->id}}">Your Profile</a></li>          
                        @elseif(Auth::user()->role==1)
                          {{--This is a pro user--}}
                          <li><a href="/AxisService/public/home">Home</a></li>
                          <li><a href="/AxisService/public/viewJobs">View Jobs</a></li>
                          <li><a href="/AxisService/public/orders">Your Jobs</a></li>
                          <li><a href="profile/{{Auth::user()->id}}">Your Profile</a></li>  
                        @elseif(Auth::user()->role==2)
                          {{--this is an admin--}}
                          <li><a href="/AxisService/public/home">Home</a></li>
                          <li><a href="/AxisService/public/vieworders">Create an Order</a></li>
                          <li><a href="/AxisService/public/orders">View all Orders</a></li>
                          <li><a href="profile/{{Auth::user()->id}}">Your Profile</a></li>  
                        @endif

                          <li>
                          <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                          </form>
                          </li>  

                      @endif
                      <li><a href="/AxisService/public/contact">Contact</a></li>
                      <li><a href="/AxisService/public/about">About</a></li>
                  </div>
               </li>
            </ul>
         </div>
       </div>
      </nav>

      @yield('content')
      
   </body>

      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

@yield('foot')