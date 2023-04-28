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
       {{-- <a href="{{route('customer.create')}}" class="fa-solid fa-cart-plus"> --}}
       <center><a href="{{route('customer.create')}}" class="btn btn-primary a-btn-slide-text">

        <span class="fas fa-user-plus" aria-hidden="true"></span>
        <span><strong>ADD CUSTOMER</strong></span></a><center>            
    </a>
  </div>
{{-- @if ($message = Session::get('success'))
 <div class="alert alert-success alert-block">
 <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
 </div>
@endif --}}
@if (count($errors) > 0)
  @include('layouts.flash-messages') 
@else
  @include('layouts.flash-messages') 
@endif
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Customer ID</th>
        <th>Title</th>
        <th>lname</th>
        <th>fname</th>
        <th>address</th>
        <th>phone</th>
        <th>zipcode</th>
        <th>Image</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Restore</th>
    
        </tr>
    </thead>
<tbody>
      @foreach($customers as $customer)
      <tr>
        <td>{{$customer->customer_id}}</td>
        <td>{{$customer->title}}</td>
        <td>{{$customer->lname}}</td>
        <td>{{$customer->fname}}</td>
        <td>{{$customer->addressline}}</td>
        <td>{{$customer->phone}}</td>
        <td>{{$customer->zipcode}}</td>
       {{--  <td><img src="{{ asset($customer->img_path) }}" width="80" 
                     height="80" class="img-circle" ></td> --}}
                     <td><img src="{{ asset('images/'.$customer->img_path) }}" width ="80" height="80" class="img-circle" enctype="multipart/form-data"/></td>

        <td align="center">
          @if($customer->deleted_at)
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{ route('customer.show',$customer->customer_id) }}">
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
        <td align="center">
          @if($customer->deleted_at)
            <ii class="fas fa-user-edit" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{route('customer.edit',$customer->customer_id)}}">
            <i class="fas fa-user-edit" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
      <td align="center">
          @if($customer->deleted_at)
              <i class="fas fa-user-times" style="font-size:24px; color:gray" ></i>
          @else
              {!! Form::open(array('route' => array('customer.destroy', $customer->customer_id),'method'=>'DELETE')) !!}
             <button ><i class="fas fa-user-times" style="font-size:20px; color:red" ></i></button>
             {!! Form::close() !!}
           @endif
         </td>
        @if($customer->deleted_at)
          <td align="center"><a href="{{ route('customer.restore',$customer->customer_id) }}" ><i class="fa fa-undo" style="font-size:24px; color:red" disabled="true"></i></a>
        </td>
        @else
        <td align="center"><a href="#" ><i class="fa fa-undo" style="font-size:24px; color:gray" ></i></a>
      </td>
        @endif
      </tr>
        
      @endforeach
</table>
<div>{{$customers->links()}}</div>
</div>
</div>
@endsection