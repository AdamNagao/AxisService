@extends('layouts.default')


@section('content')
<div class="container" style="margin-top: 8%">
   <div class="row">
      <div class="col-md-4">
         <h3>Terms and Conditions</h3>
         <p>A- Service provider agrees to be screened in order to join Axis</p>
         <p>B- Service provider agrees to do the job in accordance with home owner’s 100% satisfaction or waiver his contracted pay and the job so that we can give it to someone else to finish it </p>
         <p>C- Service provider agrees to get paid his/hers full amount less 20%  fee for Axis 2 weeks after the job is completed and home owner has sent in his release form</p>
      </div>
      <div class="col-md-8">
         <div class="panel panel-default">
            <h2>Register as a Pro</h2>
            <div class="panel-heading"></div>
            <div class="panel-body">
               <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                  {{ csrf_field() }}
                  <div class="form-group{{ $errors->has('first') ? ' has-error' : '' }}">
                     <label for="first" class="col-md-4 control-label">First Name</label>
                     <div class="col-md-6">
                        <input id="first" type="text" class="form-control" name="first" value="{{ old('first') }}" required autofocus>
                        @if ($errors->has('first'))
                        <span class="help-block">
                        <strong>{{ $errors->first('first') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>

                  <div class="form-group{{ $errors->has('last') ? ' has-error' : '' }}">
                     <label for="last" class="col-md-4 control-label">Last Name</label>
                     <div class="col-md-6">
                        <input id="last" type="text" class="form-control" name="last" value="{{ old('last') }}" required autofocus>
                        @if ($errors->has('last'))
                        <span class="help-block">
                        <strong>{{ $errors->first('last') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>


                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                     <label for="address" class="col-md-4 control-label">Home Address</label>
                     <div class="col-md-6">
                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                        @if ($errors->has('address'))
                        <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>


                  <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                     <label for="city" class="col-md-4 control-label">City</label>
                     <div class="col-md-6">
                        <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                        @if ($errors->has('city'))
                        <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>


                  <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                     <label for="state" class="col-md-4 control-label">State</label>
                     <div class="col-md-6">
                        <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required>
                        @if ($errors->has('state'))
                        <span class="help-block">
                        <strong>{{ $errors->first('state') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>


                  <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                     <label for="phonenumber" class="col-md-4 control-label">Phone Number</label>
                     <div class="col-md-6">
                        <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required>
                        @if ($errors->has('phonenumber'))
                        <span class="help-block">
                        <strong>{{ $errors->first('phonenumber') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     <label for="email" class="col-md-4 control-label">E-mail Address</label>
                     <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  
                  <div class="row">
                     <legend class="col-form-label col-sm-2 pt-0">Role</legend>
                     <div class="col-sm-10">
                        <div>
                           <input class="form-check-input" onclick="hideorshow();" type="radio" name="role" id="gridRadios2" value="1" checked>
                           <label class="form-check-label" for="gridRadios2">
                           Pro
                           </label>
                        </div>

                        <div id="reveal-if-active">
                           <label class="form-check-label" for="licenseNum">License Number</label>
                           <input id="licenseNum" type="text" class="form-control" name="licenseNum">

                           <label class="form-check-label" for="insuranceNum">Workers Comp Insurance Number</label>
                           <input id="insuranceNum" type="text" class="form-control" name="insuranceNum">

                           <label class="form-check-label" for="liabilityNum">General Liability Number</label>
                           <input id="liabilityNum" type="text" class="form-control" name="liabilityNum">
                        </div>

                     </div>
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                     <label for="password" class="col-md-4 control-label">Password</label>
                     <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                     <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                        Register
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('foot')

@endsection