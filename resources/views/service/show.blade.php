@extends('layouts.master')
@section('content')
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                               <td><img src="{{ asset('images/'.$service->img_path) }}" width ="360" height="360" class="img-circle" enctype="multipart/form-data"/></td>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2>
                                        <p>Service ID: {{ $service->service_id}}</p>
                                    </h2>
                                    <h2>
                                       <p>Service name: {{ $service->service_name}}</p>
                                    </h2>
                                    <h2>
                                        <p>Service cost: {{ $service->service_cost}}</p>
                                    </h2>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
@endsection
