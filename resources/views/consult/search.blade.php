@extends('layouts.master')
@section('content')
<style>
p{
   color: #888888;  
}
h2{
  border: 1px solid;
  padding: 2px;
  box-shadow: 2px 2px 2px #00FFFF;
  color: #00FFFF;
}

.container .emp-profile{
  border: 2px solid;
  padding: 2px;
  box-shadow: 5px 5px 5px #888888;
}

.emp-profile{
   padding: 1%;
   margin-top: 1%;
    margin-bottom: 2%;
    border-radius: 5rem;
    background: #fff;
}
.profile-head h2{
    color: #800080;
}
</style>
<h2>PET PROFILE</h2>
<div class="container emp-profile">
            <form method="post">
                 @foreach($pet as $pets)
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <td><img src="{{ asset('images/'.$pets->img_path) }}" width ="360" height="360" class="img-circle" enctype="multipart/form-data"/></td>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2>
                                        <p>Pet ID: {{ $pets->pet_id}}</p>
                                    </h2>
                                    <h2>
                                        <p>Pet name: {{ $pets->pname}}</p>
                                    </h2>
                                    <h2>
                                       <p>Owner name: {{ $pets->fname}}</p>
                                    </h2>
                                    <h2>
                                       <p>Breed: {{ $pets->pbreed}}</p>
                                    </h2>
                                    <h2>
                                       <p>Gender: {{ $pets->gender}}</p>
                                    </h2>
                                    <h2>
                                       <p>Age: {{ $pets->age}}</p>
                                    </h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </form>           
        </div>

<h2>PET MEDICAL HISTORY PROFILE</h2>
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Consultation ID</th>
        <th>Veterinarian name</th>
        {{-- <th>Pet name</th>
        <th>Pet gender</th>
        <th>Pet age</th> --}}
        <th>Disease or Injuries</th>
        <th>Observation</th>
        <th>Cost</th>
        </tr>
    </thead>
<tbody>
      @foreach($consultations as $consultation)
      <tr>
        <td>{{$consultation->consult_id}}</td>
        <td>{{$consultation->lname}}</td>
        {{-- <td>{{$consultation->pname}}</td>
        <td>{{$consultation->gender}}</td>
        <td>{{$consultation->age}}</td> --}}
        <td>{{$consultation->disease_name}}</td>
         <td>{{$consultation->observation}}</td>
        <td>{{$consultation->consult_cost}}</td>
        @endforeach
@endsection
