@extends('layouts.master')
@section('content')
<style >
 .container {
  color:  #FFFFFF;
}

</style>
<div class="container">

  <h2>Create new Customer</h2>
  <form method="post" action="{{route('customer.store')}}" enctype="multipart/form-data" >
  @csrf
  <div class="form-group">
    <label for="title" class="control-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Title">
    @if($errors->has('title'))
    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
   @endif 
  </div> 
<div class="form-group"> 
    <label for="lname" class="control-label">Last name</label>
    <input type="text" class="form-control " id="lname" name="lname" value="{{old('lname')}}"placeholder="Lastname">
    </text>@if($errors->has('lname'))
    <div class="alert alert-danger">{{ $errors->first('lname') }}</div>
   @endif 
  </div> 
  <div class="form-group"> 
    <label for="fname" class="control-label">First Name</label>
    <input type="text" class="form-control " id="fname" name="fname" value="{{old('fname')}}"placeholder="Firstname">
    @if($errors->has('fname'))
    <div class="alert alert-danger">{{ $errors->first('fname') }}</div>
   @endif 
  </div>
<div class="form-group"> 
    <label for="address" class="control-label">Address</label>
    <input type="text" class="form-control" id="address" name="addressline" value="{{old('addressline')}}" placeholder="Address">
    @if($errors->has('addressline'))
    <div class="alert alert-danger">{{ $errors->first('addressline') }}</div>
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
    <label for="zipcode" class="control-label">Zip code</label>
    <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{old('zipcode')}}"placeholder="Zipcode">
    @if($errors->has('zipcode'))
    <div class="alert alert-danger">{{ $errors->first('zipcode') }}</div>
   @endif 
  </div>
  <div class="form-group"> 
    <label for="phone" class="control-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}"placeholder="Phone">
    @if($errors->has('phone'))
    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
   @endif 
  </div>
  <div class="form-group">
    <label for="image" class="control-label">Customer Image</label>
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