@extends('layouts.master')

@section('content')
<div class="container emp-profile">
     @foreach($consultations as $consultation)
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2>
                                        <p>Veterinarian: {{ $consultation->fname}}</p>
                                    </h2>
                                    <h2>
                                        <p>Pet name: {{ $consultation->pname}}</p>
                                    </h2>
                                    <h2>
                                       <p>Pet gender: {{ $consultation->gender}}</p>
                                    </h2>
                                    <h2>
                                       <p>Pet age: {{ $consultation->age}}</p>
                                    </h2>
                                    <h2>
                                       <p>Disease: {{ $consultation->disease_name}}</p>
                                    </h2>
                                     <h2>
                                      <p>Cost: {{ $consultation->consult_cost}}</p>
                                    </h2>
                                     <h2>
                                      <p>Observation: {{ $consultation->observation}}</p>
                                    </h2>
                        </div>
                    </div>
                </div>
            </form>  
            @endforeach         
        </div>
@endsection
