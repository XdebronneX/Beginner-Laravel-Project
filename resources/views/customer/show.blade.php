@extends('layouts.master')

@section('content')
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                             <td><img src="{{ asset('images/'.$customer->img_path) }}" width ="360" height="360" class="img-circle" enctype="multipart/form-data"/></td>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2>
                                        <p>Title: {{ $customer->title}}</p>
                                    </h2>
                                    <h2>
                                        <p>Firtsname: {{ $customer->fname}}</p>
                                    </h2>
                                    <h2>
                                       <p>Lastname: {{ $customer->lname}}</p>
                                    </h2>
                                    <h2>
                                       <p>Address: {{ $customer->addressline}}</p>
                                    </h2>
                                    <h2>
                                       <p>Zipcode: {{ $customer->zipcode}}</p>
                                    </h2>
                                     <h2>
                                      <p>Phone: {{ $customer->phone}}</p>
                                    </h2>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
@endsection
