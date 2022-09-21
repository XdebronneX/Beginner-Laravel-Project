@extends('layouts.master')
@section('content')
<style>
 .container {
  color:  #FFFFFF;
}
</style>
<div class="container">
  <h2>Edit Customer</h2>
   {{ Form::model($service,['route' => ['service.update',$service->service_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}

  <div class="form-group">
    <label for="service_name" class="control-label">Service name:</label>
    {{ Form::text('service_name',null,array('class'=>'form-control','customer_id'=>'service_name')) }}
    @if($errors->has('service_name'))
    <div class="alert alert-danger">>{{ $errors->first('service_name') }}</div>
    @endif
  </div> 
<div class="form-group"> 
    <label for="service_cost" class="control-label">Service cost:</label>
    {{ Form::text('service_cost',null,array('class'=>'form-control','customer_id'=>'service_cost')) }}
    @if($errors->has('service_cost'))
    <div class="alert alert-danger">{{ $errors->first('service_cost') }}</div>
    @endif
  </div> 
  <div class="form-group">
    <label for="image" class="control-label">Customer Image:</label>
    <input type="file" class="form-control" id="image" name="image">
     <img src="{{ asset('images/'.$service->img_path) }}" width ="100" height="100" class="img-circle" enctype="multipart/form-data"/>
    @if($errors->has('img_path'))
    <div class="alert alert-danger">{{ $errors->first('img_path') }}</div>
    @endif
  </div>
  </div>

<button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
{!! Form::close() !!} 
@endsection