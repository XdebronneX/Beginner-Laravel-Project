@extends('layouts.master')

@section('content')
{{-- <style>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
</style> --}}
<style >
.a-btn-slide-text {
  padding: 1%;
   margin-top: 1%;
    margin-bottom: 2%;
    margin-left: 83%;
    border-radius: 1.5rem;
    /*background: #fff;*/
}
</style>
  <div class="container">
       {{-- <a href="{{route('pet.create')}}" class="fa-solid fa-cart-plus"> --}}
       <center><a href="{{route('pet.create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="fas fa-user-plus" aria-hidden="true"></span>
        <span><strong>ADD PET</strong></span></a><center>            
    </a>
  </div>
@if ($message = Session::get('success'))
 <div class="alert alert-success alert-block">
 <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
 </div>
@endif
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Pet ID</th>
        <th>Customer name</th>
        <th>Breed</th>
        <th>Pet name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Image</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Restore</th>
    
        </tr>
    </thead>
<tbody>
      @foreach($pets as $pet)
      <tr>
        <td>{{$pet->pet_id}}</td>
        <td>{{$pet->fname}}</td>
        <td>{{$pet->pbreed}}</td>
        <td>{{$pet->pname}}</td>
        <td>{{$pet->gender}}</td>
        <td>{{$pet->age}}</td>
        {{-- <td><img src="{{ asset($pet->img_path) }}" width="80" 
                     height="80" class="img-circle" ></td> --}}
                     <td><img src="{{ asset('images/'.$pet->img_path) }}" width ="80" height="80" class="img-circle" enctype="multipart/form-data"/></td>

        <td align="center">
          @if($pet->deleted_at)
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{ route('pet.show',$pet->pet_id) }}">
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
        <td align="center">
          @if($pet->deleted_at)
            <ii class="fas fa-user-edit" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{route('pet.edit',$pet->pet_id)}}">
            <i class="fas fa-user-edit" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
      <td align="center">
          @if($pet->deleted_at)
              <i class="fas fa-user-times" style="font-size:24px; color:gray" ></i>
          @else
              {!! Form::open(array('route' => array('pet.destroy', $pet->pet_id),'method'=>'DELETE')) !!}
             <button ><i class="fas fa-user-times" style="font-size:24px; color:red" ></i></button>
             {!! Form::close() !!}
           @endif
         </td>
        @if($pet->deleted_at)
          <td align="center"><a href="{{ route('pet.restore',$pet->pet_id) }}" ><i class="fa fa-undo" style="font-size:24px; color:red" disabled="true"></i></a>
        </td>
        @else
        <td align="center"><a href="#" ><i class="fa fa-undo" style="font-size:24px; color:gray" ></i></a>
      </td>
        @endif
      </tr>
        
      @endforeach
</table>
<div>{{$pets->links()}}</div>
</div>
</div>
@endsection