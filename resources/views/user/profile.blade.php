@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>USER LOGGED IN!</h1>
            <h2><strong><p>{{ Auth::user()->name}}</strong></h2></p>
            <h2><strong><span></h2><p>{{ Auth::user()->email}}</span></strong></h2></p>
        </div>
     </div>
@endsection
