@extends('layouts.master')
@section('content')
<style>
 .container {
  color:  #FFFFFF;
}
</style>
<div class="container">
  <h2>Create new consultation</h2>
  <form method="post" action="{{route('consult.store')}}" enctype="multipart/form-data" >
  @csrf
  <div class="form-group">
    <label for="pet_id">Pet name</label>
    {!! Form::select('pet_id', $pets, null, ['placeholder'=>'******Please Choose!******' ,'class' => 'form-control']) !!}
    @if($errors->has('pet_id'))
    <div class="alert alert-danger">{{ $errors->first('pet_id') }}</div>
   @endif 
  </div>
  <div class="form-group">
    <label for="disease_id">Disease or Injuries</label>
    {!! Form::select('disease_id', $diseases, null, ['placeholder'=>'******Please Choose!******','class' => 'form-control']) !!}
    @if($errors->has('disease_id'))
    <div class="alert alert-danger">{{ $errors->first('disease_id') }}</div>
   @endif 
  </div>
  <div class="form-group"> 
    <label for="observation" class="control-label">Observation</label>
    <input type="text" class="form-control " id="observation" name="observation" value="{{old('observation')}}"placeholder="Observation">
    @if($errors->has('observation'))
    <div class="alert alert-danger">{{ $errors->first('observation') }}</div>
   @endif 
  </div>
<div class="form-group"> 
    <label for="consult_cost" class="control-label">Consult cost</label>
    <input type="number" class="form-control" id="consult_cost" name="consult_cost" value="{{old('consult_cost')}}" placeholder="Cost">
    @if($errors->has('consult_cost'))
    <div class="alert alert-danger">{{ $errors->first('consult_cost') }}</div>
   @endif 
  </div>
<button type="submit" class="btn btn-primary">Save</button>
  <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
</form> 
@endsection