@extends('layouts.master')
@section('content')
<style>
 .container {
  color:  #FFFFFF;
}
</style>
<div class="container">
  <h2>Create new user</h2>
  <form method="post" action="{{route('employee.store')}}" enctype="multipart/form-data" >
  @csrf
  <div class="form-group">
    <label for="fname" class="control-label">Firstname</label>
    <input type="text" class="form-control" id="fname" name="fname" value="{{old('fname')}}" placeholder="Firstname">
    @if($errors->has('fname'))
     <div class="alert alert-danger">{{ $errors->first('fname') }}</div>
   @endif 
  </div> 
<div class="form-group"> 
    <label for="lname" class="control-label">Last name</label>
    <input type="text" class="form-control " id="lname" name="lname" value="{{old('lname')}}"placeholder="Lastname">
    @if($errors->has('lname'))
     <div class="alert alert-danger">{{ $errors->first('lname') }}</div>
   @endif 
  </div> 
  <div class="form-group">
    <label for="addressline" class="control-label">Addressline</label>
    <input type="text" class="form-control" id="addressline" name="addressline" value="{{old('addressline')}}" placeholder="Address">
    @if($errors->has('addressline'))
   <div class="alert alert-danger">{{ $errors->first('addressline') }}</dviv>
   @endif 
  </div> 
  <div class="form-group">
    <label for="town" class="control-label">Town</label>
    <input type="text" class="form-control" id="town" name="town" value="{{old('town')}}" placeholder="Town">
    @if($errors->has('town'))
  <div class="alert alert-danger">{{ $errors->first('town') }}</div>
   @endif 
  </div> 
  <div class="form-group">
    <label for="phone" class="control-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="Firstname">
    @if($errors->has('phone'))
     <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
   @endif 
  </div> 
  <div class="form-group">
    <label for="zipcode" class="control-label">Zipcode</label>
    <input type="number" class="form-control" id="zipcode" name="zipcode" value="{{old('zipcode')}}" placeholder="Firstname">
    @if($errors->has('zipcode'))
     <div class="alert alert-danger">{{ $errors->first('zipcode') }}</div>
   @endif 
  </div> 
  <div class="form-group"> 
    <label for="email" class="control-label">Email</label>
    <input type="email" class="form-control " id="email" name="email" value="{{old('email')}}"placeholder="Email">
    @if($errors->has('email'))
    <small>{{ $errors->first('email') }}</small>
   @endif 
  </div>
<div class="form-group"> 
    <label for="password" class="control-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Password">
    @if($errors->has('password'))
    <small>{{ $errors->first('password') }}</small>
   @endif 
  </div>
  <div class="form-group">
    <label for="image" class="control-label">User Image</label>
    <input type="file" class="form-control" id="image" name="image">
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
<button type="submit" class="btn btn-primary">Save</button>
  <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
</form> 
@endsection