@extends('layouts.master')
@section('content')
<style>
  h2{
  margin-right: 20%;
  margin-left: 33%;
  }
  .container .form-group{
  width:30pc;
  border: 5px solid #ccc;
  padding: 70px;
  margin-top: 3%;
  margin-bottom: 10%;
  margin-right: 10%;
  margin-left: 20%;
  background: #fff;
  border-radius: 50px;
  }
  .btn-primary{
  margin-left: 36%;
  /*padding: 10px;*/
  margin-top: -35%;
  margin-bottom: -5%;
  }
  .btn-default{
  margin-right: 30%;
  /*padding: 10px;*/
  margin-top: -35%;
  margin-bottom: -5%;
  }
</style>
<div class="container">
<ul class="errors">
 @foreach($errors->all() as $message)
   <li><p>{{ $message }}</p></li>
 @endforeach
 </ul>
  <h2>Create new Pet</h2>
  <form method="post" action="{{route('breed.store')}}" enctype="multipart/form-data" >
  @csrf
  <div class="form-group"> 
    <label for="pbreed" class="control-label">Breed</label>
    <input type="text" class="form-control " id="pbreed" name="pbreed" value="{{old('pbreed')}}"placeholder="Service name">
    @if($errors->has('pbreed'))
    <small>{{ $errors->first('pbreed') }}</small>
   @endif 
  </div>
<button type="submit" class="btn btn-primary">Save</button>
  <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
</form> 
@endsection