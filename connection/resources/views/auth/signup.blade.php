@extends('templates.default')

@section('content')
<h3>Sign Up</h3>
  <div class="row">
  	<div class="col-lg-6">
  <form class="form-vertical" role="form" method="post" action="{{ route('auth.signup') }}">
  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="control-label">Your Email address</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ Request::old('email') ?: '' }}">
    @if ($errors->has('email'))
      <span class="help-block">{{ $errors->first('email') }}</span>
    @endif
  </div>
  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="username" class="control-label">Choose A Username</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="Enter A Username" value="{{ Request::old('username') ?: '' }}">
     @if ($errors->has('username'))
      <span class="help-block">{{ $errors->first('username') }}</span>
    @endif
  </div>
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="control-label">Choose A Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Enter The Password">
     @if ($errors->has('password'))
      <span class="help-block">{{ $errors->first('password') }}</span>
    @endif
  </div>
  <div class="form-group">
  	<button type="submit" class="btn btn-default">Sign Up</button>
  </div>
  <input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
</div>
</div>
@stop