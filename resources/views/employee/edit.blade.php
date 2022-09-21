@extends('layouts.master')
@section('content')
<style>
 .container {
  color:  #FFFFFF;
}
</style>
<div class="container">
  <h2>Edit employee</h2>
   {{ Form::model($employee,['route' => ['employee.update',$employee->emp_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}

   <div class="form-group"> 
    <label for="fname" class="control-label">First Name:</label>
    {{ Form::text('fname',null,array('class'=>'form-control','emp_id'=>'fname')) }}
    @if($errors->has('fname'))
    <small>{{ $errors->first('fname') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="lname" class="control-label">Last name:</label>
    {{ Form::text('lname',null,array('class'=>'form-control','emp_id'=>'lname')) }}
    @if($errors->has('lname'))
    <small>{{ $errors->first('lname') }}</small>
    @endif
  </div> 

  <div class="form-group"> 
    <label for="addressline" class="control-label">Addressline:</label>
    {{ Form::text('addressline',null,array('class'=>'form-control','emp_id'=>'addressline')) }}
    @if($errors->has('addressline'))
    <small>{{ $errors->first('addressline') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="town" class="control-label">Town:</label>
    {{ Form::text('town',null,array('class'=>'form-control','emp_id'=>'town')) }}
    @if($errors->has('town'))
    <small>{{ $errors->first('town') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="zipcode" class="control-label">Zipcode:</label>
    {{ Form::text('zipcode',null,array('class'=>'form-control','emp_id'=>'zipcode')) }}
    @if($errors->has('zipcode'))
    <small>{{ $errors->first('zipcode') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="phone" class="control-label">Phone:</label>
    {{ Form::text('phone',null,array('class'=>'form-control','emp_id'=>'phone')) }}
    @if($errors->has('phone'))
    <small>{{ $errors->first('phone') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="email" class="control-label">Email:</label>
    {{ Form::text('email',null,array('class'=>'form-control','emp_id'=>'email')) }}
    @if($errors->has('email'))
    <small>{{ $errors->first('email') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="password" class="control-label">password:</label>
    {{ Form::text('password',null,array('class'=>'form-control','emp_id'=>'password')) }}
    @if($errors->has('password'))
    <small>{{ $errors->first('password') }}</small>
    @endif
  </div>

  <div class="form-group">
    <label for="image" class="control-label">Employee Image:</label>
    <input type="file" class="form-control" id="image" name="image" >
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

<button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
{!! Form::close() !!} 
@endsection