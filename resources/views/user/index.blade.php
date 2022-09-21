@extends('layouts.master')
@section('content')
{{-- <style>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
</style> --}}
 <div class="container">
       {{-- <a href="{{route('customer.create')}}" class="fa-solid fa-cart-plus"> --}}
       <center><a href="{{route('user.signup')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        <span><strong>ADD user+</strong></span></a><center>            
    </a>
  </div>
@if ($message = Session::get('Success'))
 <div class="alert alert-success alert-block">
 <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
 </div>
@endif
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>user ID</th>
        <th>name</th>
        <th>address</th>
        <th>town</th>
        <th>phone</th>
        <th>zipcode</th>
        <th>email</th>
        <th>Image</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Restore</th>
    
        </tr>
    </thead>
<tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->addressline}}</td>
        <td>{{$user->town}}</td>
        <td>{{$user->zipcode}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->email}}</td>


        {{-- <td><img width ='80px' height='80px' src="{{ asset('images/'.$user->img_path) }}"enctype="multipart/form-data" /></td> --}}
       {{--  <td><img src="{{ asset($user->img_path) }}" width="80" 
                     height="80" class="img-circle"></td>
 --}}
 <td><img src="{{ asset('images/'.$user->img_path) }}" width ="80" height="80" class="img-circle" enctype="multipart/form-data"/></td>
        <td align="center">
          @if($user->deleted_at)
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{ route('employee.show',$user->id) }}">
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
        <td align="center">
          @if($user->deleted_at)
            <ii class="fas fa-user-edit" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{route('employee.edit',$user->id)}}">
            <i class="fas fa-user-edit" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
      <td align="center">
          @if($user->deleted_at)
              <i class="fas fa-user-times" style="font-size:24px; color:gray" ></i>
          @else
              {!! Form::open(array('route' => array('employee.destroy', $user->id),'method'=>'DELETE')) !!}
             <button ><i class="fas fa-user-times" style="font-size:24px; color:red" ></i></button>
             {!! Form::close() !!}
           @endif
         </td>
        @if($user->deleted_at)
          <td align="center"><a href="{{ route('employee.restore',$user->id) }}" ><i class="fa fa-undo" style="font-size:24px; color:red" disabled="true"></i></a>
        </td>
        @else
        <td align="center"><a href="#" ><i class="fa fa-undo" style="font-size:24px; color:gray" ></i></a>
      </td>
        @endif
      </tr>
        
      @endforeach
</table>
{{-- <div>{{$users->links()}}</div> --}}
</div>
</div>
@endsection
    
