@extends('layouts.master')
@section('content')
<style>
 .container {
  color:  #FFFFFF;
}
</style>
<div class="container">
  <h2>Create new service</h2>
  <form method="post" action="{{route('service.store')}}" enctype="multipart/form-data" >
  @csrf
  <div class="form-group"> 
    <label for="service_name" class="control-label">Service Name</label>
    <input type="text" class="form-control " id="service_name" name="service_name" value="{{old('service_name')}}"placeholder="Service name">
    @if($errors->has('service_name'))
    <div class="alert alert-danger">{{ $errors->first('service_name') }}</div>
   @endif 
  </div>
<div class="form-group"> 
    <label for="service_cost" class="control-label">Service Cost</label>
    <input type="number" class="form-control" id="service_cost" name="service_cost" value="{{old('service_cost')}}"placeholder="Service cost">
    @if($errors->has('service_cost'))
   <div class="alert alert-danger">{{ $errors->first('service_cost') }}</div>
   @endif 
  </div>
  <div class="form-group">
    <label for="image" class="control-label">Service Image</label>
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