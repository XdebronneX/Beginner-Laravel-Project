@extends('layouts.master')
@section('content')
<style>
 .container {
  color:  #FFFFFF;
}
</style>
<div class="container">
  <h2>Create new Pet</h2>
  <form method="post" action="{{route('pet.store')}}" enctype="multipart/form-data" >
  @csrf
  <div class="form-group">
    <label for="customer_id">Owner name</label>
    {!! Form::select('customer_id', $customers, null, ['placeholder'=>'******Please Choose Owner name below!******' ,'class' => 'form-control']) !!}
    @if($errors->has('customer_id'))
    <div class="alert alert-danger">{{ $errors->first('customer_id') }}</div>
   @endif 
  </div>
  <div class="form-group">
    <label for="petb_id">Pet Breed</label>
    {!! Form::select('petb_id', $pet_breed, null, ['placeholder'=>'******Please Choose Breed of your pet below!******','class' => 'form-control']) !!}
    @if($errors->has('petb_id'))
    <div class="alert alert-danger">{{ $errors->first('petb_id') }}</div>
   @endif 
  </div>
  <div class="form-group"> 
    <label for="pname" class="control-label">Pet Name</label>
    <input type="text" class="form-control " id="pname" name="pname" value="{{old('pname')}}"placeholder="Pet name">
    @if($errors->has('pname'))
    <div class="alert alert-danger">{{ $errors->first('pname') }}</div>
   @endif 
  </div>
<div class="form-group"> 
    <label for="gender" class="control-label">Gender</label>
    <input type="gender" class="form-control" id="gender" name="gender" value="{{old('gender')}}" placeholder="Gender">
    @if($errors->has('gender'))
    <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
   @endif 
  </div>
  <div class="form-group"> 
    <label for="age" class="control-label">Age</label>
    <input type="number" class="form-control" id="age" name="age" value="{{old('age')}}" placeholder="Age">
    @if($errors->has('age'))
    <div class="alert alert-danger">{{ $errors->first('age') }}</div>
   @endif 
  </div>
  <div class="form-group">
    <label for="image" class="control-label">Pet Image</label>
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