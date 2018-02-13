<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="{{ asset('css/default.css') }}" rel="stylesheet" type="text/css" >
      @yield('head')
      <title>Axis Service</title>
   </head>
   <body>

    <nav class="navbar navbar-dark bg-dark box-shadow fixed-top">
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


    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar" >
          <div class="sidebar">
            <ul class="nav flex-column" style ="background-color:lightgray;">
              @if(Auth::user()->role==0)
                {{--This is a user--}}
                <li class="nav-item">
                  <a class="nav-link active" href="/AxisService/public/home">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/AxisService/public/order">
                    <span data-feather="folder"></span>
                    Order a new job <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/AxisService/public/orders">
                    <span data-feather="briefcase"></span>
                    Your Orders <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/AxisService/public/profile/{{Auth::user()->id}}">
                    <span data-feather="user"></span>
                    Your Profile <span class="sr-only">(current)</span>
                    </a>
                </li>
              @elseif(Auth::user()->role==1)
                {{--This is a pro user--}}
                <li class="nav-item">
                  <a class="nav-link active" href="/AxisService/public/home">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/AxisService/public/viewJobs">
                    <span data-feather="folder"></span>
                    View Jobs <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/AxisService/public/orders">
                    <span data-feather="briefcase"></span>
                    Your Jobs <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/AxisService/public/profile/{{Auth::user()->id}}">
                    <span data-feather="user"></span>
                    Your Profile <span class="sr-only">(current)</span>
                  </a>
                </li>
              @elseif(Auth::user()->role==2)
                  {{--this is an admin--}}
                  <li class="nav-item">
                     <a class="nav-link active" href="/AxisService/public/home">
                     <span data-feather="home"></span>
                     Home <span class="sr-only">(current)</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="/AxisService/public/order">
                     <span data-feather="folder"></span>
                     Create an Order <span class="sr-only">(current)</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="/AxisService/public/orders">
                     <span data-feather="briefcase"></span>
                     View all Orders <span class="sr-only">(current)</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="/AxisService/public/profile/{{Auth::user()->id}}">
                     <span data-feather="user"></span>
                     Your Profile <span class="sr-only">(current)</span>
                     </a>
                  </li>
              @endif
            </ul>
          </div>
        </nav>
        <div class="col-md-8 offset-md-1">
          @yield('content')
        </div>
      </div>
    </div>
   </body>
      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
      <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
      <script>
        feather.replace()
      </script>
   @yield('foot')