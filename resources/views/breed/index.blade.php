@extends('layouts.master')

@section('content')
  <div class="container">
       {{-- <a href="{{route('customer.create')}}" class="fa-solid fa-cart-plus"> --}}
       <center><a href="{{route('breed.create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        <span><strong>ADD Breed+</strong></span></a><center>            
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
        <th>Breed ID</th>
        <th>Breed</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Restore</th>
    
        </tr>
    </thead>
<tbody>
      @foreach($breeds as $breed)
      <tr>
        <td>{{$breed->petb_id}}</td>
        <td>{{$breed->pbreed}}</td>
        <td align="center">
          @if($breed->deleted_at)
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{ route('breed.show',$breed->petb_id) }}">
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
        <td align="center">
          @if($breed->deleted_at)
            <ii class="fas fa-user-edit" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{route('breed.edit',$breed->petb_id)}}">
            <i class="fas fa-user-edit" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
      <td align="center">
          @if($breed->deleted_at)
              <i class="fas fa-user-times" style="font-size:24px; color:gray" ></i>
          @else
              {!! Form::open(array('route' => array('breed.destroy', $breed->petb_id),'method'=>'DELETE')) !!}
             <button ><i class="fas fa-user-times" style="font-size:24px; color:red" ></i></button>
             {!! Form::close() !!}
           @endif
         </td>
        @if($breed->deleted_at)
          <td align="center"><a href="{{ route('breed.restore',$breed->petb_id) }}" ><i class="fa fa-undo" style="font-size:24px; color:red" disabled="true"></i></a>
        </td>
        @else
        <td align="center"><a href="#" ><i class="fa fa-undo" style="font-size:24px; color:gray" ></i></a>
      </td>
        @endif
      </tr>
        
      @endforeach
</table>
<div>{{$breeds->links()}}</div>
</div>
</div>
@endsection