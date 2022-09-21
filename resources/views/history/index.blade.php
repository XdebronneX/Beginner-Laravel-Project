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
       {{-- <a href="{{route('transact.create')}}" class="fa-solid fa-cart-plus"> --}}
       <center><a href="{{route('transact.create')}}" class="btn btn-primary a-btn-slide-text">

        <span class="fas fa-user-plus" aria-hidden="true"></span>
        <span><strong>ADD transact</strong></span></a><center>            
    </a>
  </div>
@if ($message = Session::get('success'))
 <div class="alert alert-success alert-block">
 <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
 </div>
@endif
<form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/search') }}">
<input class="form-control input-lg" name="search" type="search" placeholder="Search last name here....">
<div>
<button class="btn btn-outline-info" type="submit">Search transact Transaction</button>
</form>
</div>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Grooming ID</th>
        <th>lastname</th>
        <th>fname</th>
        <th>Pet name</th>
        <th>Service name</th>
        <th>Status</th>
         <th>Date</th>
        </tr>
    </thead>
<tbody>
      @foreach($transacts as $transact)
      <tr>
        <td>{{$transact->groominginfo_id}}</td>
        <td>{{$transact->lname}}</td>
        <td>{{$transact->fname}}</td>
        <td>{{$transact->pname}}</td>
        <td>{{$transact->service_name}}</td>
        <td>{{$transact->status}}</td>
        <td>{{$transact->created_at}}</td>
      @endforeach
</table>
{{-- <div>{{$transacts->links()}}</div> --}}
</div>
</div>
@endsection