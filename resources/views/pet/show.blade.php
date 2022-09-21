@extends('layouts.master')

@section('content')

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
@endsection
