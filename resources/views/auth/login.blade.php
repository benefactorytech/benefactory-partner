@extends('designs.app')

@section('head')
     <link rel="stylesheet" href="/css/login.css">
@endsection
@section('content')
<div class="container-fluid">
     <div class="row">
          <!--
          <div class="col-md-6" style="height: 200px; background-color: ;">
          </div>
          -->
          <div class="col-md-3"></div>
          <div class="col-md-6 login-card">
               <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                         <label for="email" class="col-md-4 control-label" style="color: black;">E-Mail Address</label>

                         <div class="col-md-6">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                              @if ($errors->has('email'))
                                   <span class="help-block">
                                   <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                              @endif
                         </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         <label for="password" class="col-md-4 control-label" style="color: black;">Password</label>

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
                         <div class="col-md-6 col-md-offset-4">
                              <div class="checkbox">
                                   <label style="color: black;">
                                   <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                   </label>
                              </div>
                         </div>
                    </div>

                    <div class="form-group">
                         <div class="col-md-8 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" style="background-color: #Ffa500; color: black; border-color: #ffa500;">
                                   Login
                              </button>

                              <a class="btn btn-link" href="{{ route('password.request') }}" style="color: black;">
                                   Forgot Your Password?
                              </a>
                         </div>
                    </div>
               </form>
          </div>
          <div class="col-md-3"></div>
     </div>
</div>
@endsection
