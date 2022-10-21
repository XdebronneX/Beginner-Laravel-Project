@extends('layouts.master')
@section('content')
<div class="container">
  <h2>Edit Customer</h2>
   {{ Form::model($breed,['route' => ['breed.update',$breed->petb_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}
<div class="form-group"> 
    <label for="fname" class="control-label">First Name:</label>
    {{ Form::text('fname',null,array('class'=>'form-control','customer_id'=>'fname')) }}
    @if($errors->has('fname'))
    <small>{{ $errors->first('fname') }}</small>
    @endif
  </div>
<button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
{!! Form::close() !!} 
@endsection