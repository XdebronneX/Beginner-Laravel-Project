@extends('layouts.master')
@section('content')
<style>
 .container {
  color:  #FFFFFF;
}
</style>
<div class="container">
<ul class="errors">
 @foreach($errors->all() as $message)
   <li><p>{{ $message }}</p></li>
 @endforeach
 </ul>
  <h2>Create new Pet</h2>
  <form method="post" action="{{route('disease.store')}}" enctype="multipart/form-data" >
  @csrf
  <div class="form-group"> 
    <label for="disease_name" class="control-label">Disease</label>
    <input type="text" class="form-control " id="disease_name" name="disease_name" value="{{old('disease_name')}}"placeholder="Service name">
    @if($errors->has('disease_name'))
    <small>{{ $errors->first('disease_name') }}</small>
   @endif 
  </div>
<button type="submit" class="btn btn-primary">Save</button>
  <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
</form> 
@endsection