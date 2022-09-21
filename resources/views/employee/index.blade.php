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
       {{-- <a href="{{route('customer.create')}}" class="fa-solid fa-cart-plus"> --}}
       <center><a href="{{route('employee.create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        <span><strong>ADD Employee+</strong></span></a><center>            
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
        <th>Employee ID</th>
        <th>firtsname</th>
        <th>lastname</th>
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
      @foreach($employees as $employee)
      <tr>
        <td>{{$employee->emp_id}}</td>
        <td>{{$employee->lname}}</td>
        <td>{{$employee->fname}}</td>
        <td>{{$employee->addressline}}</td>
        <td>{{$employee->town}}</td>
        <td>{{$employee->zipcode}}</td>
        <td>{{$employee->phone}}</td>
        <td>{{$employee->email}}</td>


        {{-- <td><img width ='80px' height='80px' src="{{ asset('images/'.$employee->img_path) }}"enctype="multipart/form-data" /></td> --}}

        <td><img src="{{ asset('images/'.$employee->img_path) }}" width ="80" height="80" class="img-circle" enctype="multipart/form-data"/></td>

        <td align="center">
          @if($employee->deleted_at)
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{ route('employee.show',$employee->emp_id) }}">
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
        <td align="center">
          @if($employee->deleted_at)
            <ii class="fas fa-user-edit" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{route('employee.edit',$employee->emp_id)}}">
            <i class="fas fa-user-edit" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
      <td align="center">
          @if($employee->deleted_at)
              <i class="fas fa-user-times" style="font-size:24px; color:gray" ></i>
          @else
              {!! Form::open(array('route' => array('employee.destroy', $employee->emp_id),'method'=>'DELETE')) !!}
             <button ><i class="fas fa-user-times" style="font-size:24px; color:red" ></i></button>
             {!! Form::close() !!}
           @endif
         </td>
        @if($employee->deleted_at)
          <td align="center"><a href="{{ route('employee.restore',$employee->emp_id) }}" ><i class="fa fa-undo" style="font-size:24px; color:red" disabled="true"></i></a>
        </td>
        @else
        <td align="center"><a href="#" ><i class="fa fa-undo" style="font-size:24px; color:gray" ></i></a>
      </td>
        @endif
      </tr>
        
      @endforeach
</table>
<div>{{$employees->links()}}</div>
</div>
</div>
@endsection
    
