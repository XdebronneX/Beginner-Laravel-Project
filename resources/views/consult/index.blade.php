@extends('layouts.master')
<style >
.a-btn-slide-text {
  padding: 1%;
   margin-top: 1%;
    margin-bottom: 10%;
    margin-left: 83%;
    border-radius: 1.5rem;
    /*background: #fff;*/
}
.input-lg{
   padding: 1%;
   margin-top: 1%;
    margin-bottom: 1%;
    margin-left: 42.5rem;
    border-radius: 1.5rem;
}
.btn-outline-info{
  padding: 1%;
   margin-top: 1%;
    margin-bottom: 10%;
    margin-left: 47.5rem;
    border-radius: 1.5rem;
}
</style>

@section('content')
  <div class="container">
       {{-- <a href="{{route('consultation.create')}}" class="fa-solid fa-cart-plus"> --}}
       <center><a href="{{route('consult.create')}}" class="btn btn-primary a-btn-slide-text">

        <span class="fas fa-user-plus" aria-hidden="true"></span>
        <span><strong>ADD consultation</strong></span></a><center>            
    </a>
  </div>
@if ($message = Session::get('success'))
 <div class="alert alert-success alert-block">
 <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
 </div>
@endif
 <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/search') }}">
<input class="form-control input-lg" name="query" type="search" placeholder="Search pet name here....">
{{-- <input class="form-control input-lg" name="search" type="search" placeholder="Search pet name here...."> --}}
<div>
<button class="btn btn-outline-info" type="submit">Search Medical of Pet</button>
</form>
</div>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Consultation ID</th>
        <th>Veterinarian name</th>
        <th>Pet name</th>
        <th>Pet gender</th>
        <th>Pet age</th>
        <th>Disease or Injuries</th>
        <th>Observation</th>
        <th>Cost</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Restore</th>
    
        </tr>
    </thead>
<tbody>
      @foreach($consultations as $consultation)
      <tr>
        <td>{{$consultation->consult_id}}</td>
        <td>{{$consultation->lname}}</td>
        <td>{{$consultation->pname}}</td>
        <td>{{$consultation->gender}}</td>
        <td>{{$consultation->age}}</td>
        <td>{{$consultation->disease_name}}</td>
         <td>{{$consultation->observation}}</td>
        <td>{{$consultation->consult_cost}}</td>

        <td align="center">
          @if($consultation->deleted_at)
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{ route('consult.show',$consultation->consult_id) }}">
            <i class="fas fa-eye" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
        <td align="center">
          @if($consultation->deleted_at)
            <ii class="fas fa-user-edit" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
          @else
          <a href="{{route('consult.edit',$consultation->consult_id)}}">
            <i class="fas fa-user-edit" aria-hidden="true" style="font-size:24px" ></i></a>
          @endif
           </td>
      <td align="center">
          @if($consultation->deleted_at)
              <i class="fas fa-user-times" style="font-size:24px; color:gray" ></i>
          @else
              {!! Form::open(array('route' => array('consult.destroy', $consultation->consult_id),'method'=>'DELETE')) !!}
             <button ><i class="fas fa-user-times" style="font-size:20px; color:red" ></i></button>
             {!! Form::close() !!}
           @endif
         </td>
        @if($consultation->deleted_at)
          <td align="center"><a href="{{ route('consult.restore',$consultation->consult_id) }}" ><i class="fa fa-undo" style="font-size:24px; color:red" disabled="true"></i></a>
        </td>
        @else
        <td align="center"><a href="#" ><i class="fa fa-undo" style="font-size:24px; color:gray" ></i></a>
      </td>
        @endif
      </tr>
        
      @endforeach
</table>
<div>{{$consultations->links()}}</div>
</div>
</div>
@endsection