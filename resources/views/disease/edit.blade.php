@extends('layouts.master')
@section('content')
<style>
 .container {
  color:  #FFFFFF;
}
</style>
<div class="container">
  <h2>Edit Customer</h2>
   {{ Form::model($disease,['route' => ['disease.update',$disease->disease_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}
<div class="form-group"> 
    <label for="disease_name" class="control-label">Disease Name:</label>
    {{ Form::text('disease_name',null,array('class'=>'form-control','customer_id'=>'disease_name')) }}
    @if($errors->has('disease_name'))
    <small>{{ $errors->first('disease_name') }}</small>
    @endif
  </div>
<button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
{!! Form::close() !!} 
@endsection