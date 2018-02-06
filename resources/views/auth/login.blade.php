@extends('layouts.default')
@section('head')
<link href="css/signin.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
   <form class="form-signin" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <h2 class="form-signin-heading">Please sign in</h2>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
         <label for="email" class="control-label">E-Mail Address</label>
         <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
         @if ($errors->has('email'))
         <span class="help-block">
         <strong>{{ $errors->first('email') }}</strong>
         </span>
         @endif
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
         <label for="password" class="col-md-4 control-label">Password</label>
         <input id="password" type="password" class="form-control" name="password" required>
         @if ($errors->has('password'))
         <span class="help-block">
         <strong>{{ $errors->first('password') }}</strong>
         </span>
         @endif
      </div>
      <div class="form-group">
         <div class="checkbox">
            <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
         </div>
      </div>
      <div class="form-group">
         <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
         <a class="btn btn-link" href="{{ route('password.request') }}">
         Forgot Your Password?
         </a>
      </div>
   </form>
</div>
@endsection