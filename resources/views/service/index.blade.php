@extends('layouts.master')
@section('content')
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
       {{-- <a href="{{route('service.create')}}" class="fa-solid fa-cart-plus"> --}}
       <center><a href="{{route('service.create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="fas fa-user-plus" aria-hidden="true"></span>
        <span><strong>ADD SERVICE+</strong></span></a><center>            
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
        <th>Service ID</th>
        <th>Service name</th>
        <th>Service cost</th>
        <th>Image</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Restore</th>
    
        </tr>
    </thead>
<tbody>
      @foreach($services as $service)
      <tr>
        <td>{{$service->service_id}}</td>
        <td>{{$service->service_name}}</td>
        <td>{{$service->service_cost}}</td>
          <td><img src="{{ asset('images/'.$service->img_path) }}" width ="80" height="80" class="img-circle" enctype="multipart/form-data"/></td>
        {{-- <td><img src="{{ asset($service->img_path) }}" width="80" 
                     height="80" class="img-circle" ></td> --}}
        <td align="center">
          @if($service->deleted_at)
            <i class="fas fa-eye" aria-hidden="true" style="font-size:30px; color:gray" ></i></a>
          @else
          <a href="{{ route('service.show',$service->service_id) }}">
            <i class="fas fa-eye" aria-hidden="true" style="font-size:30px" ></i></a>
          @endif
           </td>
        <td align="center">
          @if($service->deleted_at)
            <ii class="fas fa-user-edit" aria-hidden="true" style="font-size:30px; color:gray" ></i></a>
          @else
          <a href="{{route('service.edit',$service->service_id)}}">
            <i class="fas fa-user-edit" aria-hidden="true" style="font-size:30px" ></i></a>
          @endif
           </td>
      <td align="center">
          @if($service->deleted_at)
              <i class="fas fa-user-times" style="font-size:30px; color:gray" ></i>
          @else
              {!! Form::open(array('route' => array('service.destroy', $service->service_id),'method'=>'DELETE')) !!}
             <button ><i class="fas fa-user-times" style="font-size:30px; color:red" ></i></button>
             {!! Form::close() !!}
           @endif
         </td>
        @if($service->deleted_at)
          <td align="center"><a href="{{ route('service.restore',$service->service_id) }}" ><i class="fa fa-undo" style="font-size:30px; color:red" disabled="true"></i></a>
        </td>
        @else
        <td align="center"><a href="#" ><i class="fa fa-undo" style="font-size:24px; color:gray" ></i></a>
      </td>
        @endif
      </tr>
        
      @endforeach
</table>
<div>{{$services->links()}}</div>
</div>
</div>
@endsection