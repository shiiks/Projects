@extends('templates.default')

@section('content')
    <h3>Update Your Profile</h3>

    <div class="row">
    	<div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{ route('profile.edit') }}">
            	 <div class="row">
    				<div class="col-lg-6">	
    					<div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
     						 <label class="control-label" for="first_name">First Name
     						 </label>
        					 <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Your First Name" value="{{ Request::old('first_name') ?: Auth::user()->first_name }}">
        					 @if ($errors->has('first_name'))
        					 	<span class="help-block">{{ $errors->first('first_name') }}</span>
        					 @endif
      					</div>
    				</div>

   					 <div class="col-lg-6">	
    					<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
     						 <label class="control-label" for="last_name">Last Name
     						 </label>
        					 <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Your Last Name" value="{{ Request::old('last_name') ?: Auth::user()->last_name }}">
        					  @if ($errors->has('last_name'))
        					 	<span class="help-block">{{ $errors->first('last_name') }}</span>
        					 @endif
      					</div>
    				</div>
    			</div>
	
    				<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
     					<label class="control-label" for="location">Location
     					</label>
        				<input type="text" class="form-control" id="location" name="location" placeholder="Enter Your Location" value="{{ Request::old('location') ?: Auth::user()->location }}">
        				 @if ($errors->has('location'))
        					 	<span class="help-block">{{ $errors->first('location') }}</span>
        				 @endif
      				</div>

    				<div class="form-group">        
       					 <button type="submit" class="btn btn-default">Update</button>
   		 			</div>
   		 			<input type="hidden" name="_token" value="{{ Session::token() }}">
  			</form>
  		</div>
  	</div>
@stop