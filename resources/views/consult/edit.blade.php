@extends('layouts.master')
@section('content')
<style>
 .container {
  color:  #FFFFFF;
}
</style>
<div class="container">
  <h2>Edit Consultation</h2>
    {{ Form::model($consultations,['route' => ['consult.update',$consultations->consult_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}

<div class="form-group" >
      <label for="pets" class="control-label">Common Disease/Injuries</label>
       {!! Form::select('pet_id',$pets, $consultations->pet_id,['class' => 'form-control form-select']) !!}

      @if($errors->has('pets'))
       <div class="alert alert-danger">{{ $errors->first('pets') }}</div>
      @endif 
  </div> 
  <div class="form-group" >
      <label for="diseases" class="control-label">Common Disease/Injuries</label>
       {!! Form::select('disease_id',$diseases, $consultations->disease_id,['class' => 'form-control form-select']) !!}

      @if($errors->has('disease'))
       <div class="alert alert-danger">{{ $errors->first('disease') }}</div>
      @endif 
  </div> 

  <div class="form-group">
    <label for="observation">Observation</label>
    {!! Form::text('observation',$consultations->observation,array('class' => 'form-control')) !!}
    @if($errors->has('observation'))
    <div class="alert alert-danger">{{ $errors->first('observation') }}</div>
   @endif 
  </div>
  <div class="form-group">
    <label for="consult_cost">Consult Cost</label>
    {!! Form::text('consult_cost',$consultations->consult_cost,array('class' => 'form-control')) !!}
    @if($errors->has('consult_cost'))
    <div class="alert alert-danger">{{ $errors->first('consult_cost') }}</div>
   @endif 
  </div>

<button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
{!! Form::close() !!} 
@endsection