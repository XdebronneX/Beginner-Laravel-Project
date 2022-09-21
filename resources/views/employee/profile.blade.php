@extends('layouts.master')
@section('content')
<style>
h2{
  color: #00FFFF;
}
strong {
    color: #f2f2f2;
}
.container .user-profile{
  border: 2px solid;
  padding: 2px;
  box-shadow: 5px 5px 5px #00FFFF;
    margin-top: 15%;
    margin-bottom: 10%;
    border-radius: 50rem;
}
</style>
<div class="container user-profile">
            <form method="post">
                @foreach($employees as $employee)
                <div class="row">
                    <div class="col-md-12">
                            <center>
                                 <h2>Profile Picture</h2>
                                    <p><strong><td><img src="{{ asset('images/'.$employee->img_path) }}" width ="100" height="100" class="img-circle" enctype="multipart/form-data"/></td></strong></p>
                                            
                                    <h2>
                                        <p>Firstname:<strong>{{ $employee->fname}}</strong></p>
                                    </h2>
                                     <h2>
                                        <p>Lastname:<strong>{{ $employee->lname}}</strong></p>
                                    </h2>
                                    <h2>
                                         <p>Email: <strong>{{ $employee->email}}</strong></p>
                                    </h2>
                                    <h2>
                                        <p>Address: <strong>{{ $employee->addressline}}</strong></p>
                                    </h2>
                                    <h2>
                                       <p>Town: <strong>{{ $employee->town}}</strong></p>
                                    </h2>
                                    <h2>
                                       <p>Zipcode: <strong>{{ $employee->zipcode}}</strong></p>
                                    </h2>
                                     <h2>
                                      <p>Phone: <strong>{{ $employee->phone}}</strong></p>
                                    </h2>
                                    </center>
                        {{-- </div> --}}
                    </div>
                </div>
                @endforeach
            </form>           
        </div>
   {{--  <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>USER LOGGED IN!</h1>
            <h2><strong><p>{{ $employee()->name}}</strong></h2></p>
            <h2><strong><span></h2><p>{{ $employee()->email}}</span></strong></h2></p>
        </div>
     </div> --}}
@endsection
