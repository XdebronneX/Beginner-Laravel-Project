@extends('layouts.master')
@section('content')
<style >
 .container {
  color:  #FFFFFF;
}

</style>
<div class="container">
  <h2>Edit Customer</h2>
   {{ Form::model($customer,['route' => ['customer.update',$customer->customer_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}

  <div class="form-group">
    <label for="title" class="control-label">Title:</label>
    {{ Form::text('title',null,array('class'=>'form-control','customer_id'=>'title')) }}
    @if($errors->has('title'))
    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
    @endif
  </div> 
<div class="form-group"> 
    <label for="lname" class="control-label">Last name:</label>
    {{ Form::text('lname',null,array('class'=>'form-control','customer_id'=>'lname')) }}
    @if($errors->has('lname'))
    <div class="alert alert-danger">{{ $errors->first('lname') }}</div>
    @endif
  </div> 
<div class="form-group"> 
    <label for="fname" class="control-label">First Name:</label>
    {{ Form::text('fname',null,array('class'=>'form-control','customer_id'=>'fname')) }}
    @if($errors->has('fname'))
   <div class="alert alert-danger">{{ $errors->first('fname') }}</div>
    @endif
  </div>
  <div class="form-group"> 
    <label for="address" class="control-label">Address:</label>
    {{ Form::text('addressline',null,array('class'=>'form-control','customer_id'=>'addressline')) }}
    @if($errors->has('addressline'))
    <div class="alert alert-danger">{{ $errors->first('addressline') }}</div>
    @endif
</div>
  <div class="form-group"> 
    <label for="town" class="control-label">Town:</label>
    {{ Form::text('town',null,array('class'=>'form-control','customer_id'=>'town')) }}
    @if($errors->has('town'))
   <div class="alert alert-danger">{{ $errors->first('town') }}</div>
    @endif
  </div>
<div class="form-group"> 
    <label for="zipcode" class="control-label">Zip Code:</label>
    {{ Form::text('zipcode',null,array('class'=>'form-control','customer_id'=>'zipcode')) }}
    @if($errors->has('zipcode'))
   <div class="alert alert-danger">{{ $errors->first('zipcode') }}</div>
    @endif
  </div>
  <div class="form-group"> 
    <label for="phone" class="control-label">Phone:</label>
   {{ Form::text('phone',null,array('class'=>'form-control','customer_id'=>'phone')) }}
   @if($errors->has('phone'))
     <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
    @endif
  </div>
  <div class="form-group">
    <label for="image" class="control-label">Customer Image:</label>
    <input type="file" class="form-control" id="image" name="image">
     <img src="{{ asset('images/'.$customer->img_path) }}" width ="100" height="100" class="img-circle" enctype="multipart/form-data"/>
    @if($errors->has('img_path'))
     <div class="alert alert-danger">{{ $errors->first('img_path') }}</div>
    @endif
  </div>
  </div>


{{-- <img width ='100px' height='100px' src="{{ asset('images/'.$employee->img_path) }}"enctype="multipart/form-data" /> --}}







<button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
{!! Form::close() !!} 
@endsection