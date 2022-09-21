@extends('layouts.master')

@section('content')
{{-- <style>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
</style> --}}
  <div class="container">
       {{-- <a href="{{route('customer.create')}}" class="fa-solid fa-cart-plus"> --}}
       <center><a href="{{route('disease.create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="fas fa-user-plus" aria-hidden="true"></span>
        <span><strong>ADD DISEASES+</strong></span></a><center>            
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
        <th>Disease ID</th>
        <th>Disease name</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Restore</th>
        </tr>
    </thead>
<tbody>
      @foreach($diseases as $disease)
      <tr>
        <td>{{$disease->disease_id}}</td>
        <td>{{$disease->disease_name}}</td>
        <td align="center">
          @if($disease->deleted_at)
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{ route('disease.show',$disease->disease_id) }}">
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
        <td align="center">
          @if($disease->deleted_at)
            <ii class="fas fa-user-edit" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{route('disease.edit',$disease->disease_id)}}">
            <i class="fas fa-user-edit" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
      <td align="center">
          @if($disease->deleted_at)
              <i class="fas fa-user-times" style="font-size:24px; color:gray" ></i>
          @else
              {!! Form::open(array('route' => array('disease.destroy', $disease->disease_id),'method'=>'DELETE')) !!}
             <button ><i class="fas fa-user-times" style="font-size:24px; color:red" ></i></button>
             {!! Form::close() !!}
           @endif
         </td>
        @if($disease->deleted_at)
          <td align="center"><a href="{{ route('disease.restore',$disease->disease_id) }}" ><i class="fa fa-undo" style="font-size:24px; color:red" disabled="true"></i></a>
        </td>
        @else
        <td align="center"><a href="#" ><i class="fa fa-undo" style="font-size:24px; color:gray" ></i></a>
      </td>
        @endif
      </tr>
        
      @endforeach
</table>
<div>{{$diseases->links()}}</div>
</div>
</div>
@endsection