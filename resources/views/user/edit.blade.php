@extends('layouts.master')
@section('content')

<div class="container">
  <h2>Edit employee</h2>
   {{ Form::model($employee,['route' => ['employee.update',$employee->id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}

   <div class="form-group"> 
    <label for="name" class="control-label">Name:</label>
    {{ Form::text('name',null,array('class'=>'form-control','id'=>'name')) }}
    @if($errors->has('name'))
    <small>{{ $errors->first('name') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="addressline" class="control-label">Addressline:</label>
    {{ Form::text('addressline',null,array('class'=>'form-control','id'=>'addressline')) }}
    @if($errors->has('addressline'))
    <small>{{ $errors->first('addressline') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="town" class="control-label">Town:</label>
    {{ Form::text('town',null,array('class'=>'form-control','id'=>'town')) }}
    @if($errors->has('town'))
    <small>{{ $errors->first('town') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="zipcode" class="control-label">Zipcode:</label>
    {{ Form::text('zipcode',null,array('class'=>'form-control','id'=>'zipcode')) }}
    @if($errors->has('zipcode'))
    <small>{{ $errors->first('zipcode') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="phone" class="control-label">Phone:</label>
    {{ Form::text('phone',null,array('class'=>'form-control','id'=>'phone')) }}
    @if($errors->has('phone'))
    <small>{{ $errors->first('phone') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="email" class="control-label">Email:</label>
    {{ Form::text('email',null,array('class'=>'form-control','id'=>'email')) }}
    @if($errors->has('email'))
    <small>{{ $errors->first('email') }}</small>
    @endif
  </div>

  <div class="form-group"> 
    <label for="password" class="control-label">password:</label>
    {{ Form::text('password',null,array('class'=>'form-control','id'=>'password')) }}
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