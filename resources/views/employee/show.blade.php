@extends('layouts.master')
@section('content')
{{-- <style>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
/*.profile-head h2{
    color: #333;
}*/
h2 {
  color: white;
  text-shadow: 2px 2px 4px #000000;
}
.profile-head h2{
    color: #0062cc;
}
</style> --}}
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            {{-- <img src="{{asset($employee->img_path)}}" width="340" height="340" class="img-circle"> --}}
                             <td><img src="{{ asset('images/'.$employee->img_path) }}" width ="360" height="360" class="img-circle" enctype="multipart/form-data"/></td>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2>
                                        <p>Username: {{ $employee->name}}</p>
                                    </h2>
                                    <h2>
                                         <p>Email: {{ $employee->email}}</p>
                                    </h2>
                                    <h2>
                                        <p>Address: {{ $employee->addressline}}</p>
                                    </h2>
                                    <h2>
                                       <p>Town: {{ $employee->town}}</p>
                                    </h2>
                                    <h2>
                                       <p>Zipcode: {{ $employee->zipcode}}</p>
                                    </h2>
                                     <h2>
                                      <p>Phone: {{ $employee->phone}}</p>
                                    </h2>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

@endsection
