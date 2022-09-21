
    <nav class="navbar navbar-light bg-light">
  <form class="container-fluid justify-content-start">
    <button class="btn btn-outline-success me-2" type="button">Main button</button>
    <button class="btn btn-sm btn-outline-secondary" type="button">Smaller button</button>
  </form>


    <div class="collapse">
      <ul class="main-menu list-unstyled">
        <a class="navbar-brand" href="home">HOME</a>
      <a class="navbar-brand" href="{{ route('customer.index') }}">Customers</a>
      <a class="navbar-brand" href="{{ route('employee.index') }}">Employees</a>
      <a class="navbar-brand" href="{{ route('pet.index') }}">Pets</a>
      {{-- <a class="navbar-brand" href="{{ route('breed.index') }}">Breeds</a>
      <a class="navbar-brand" href="{{ route('disease.index') }}">Diseases</a> --}}
      <a class="navbar-brand" href="{{ route('service.index') }}">Grooming Services</a>
      </ul>

      <form action="#" method="GET" id="search-form-1">
        <input type="text" name="txt-search" id="txt-search" placeholder="Search ...">
        <input type="submit" class="btn-search" value="">
      </form>
    </div>
</nav>



























<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
  
      <a class="navbar-brand" href="home">HOME</a>
      <a class="navbar-brand" href="{{ route('customer.index') }}">Customers</a>
      <a class="navbar-brand" href="{{ route('employee.index') }}">Employees</a>
      <a class="navbar-brand" href="{{ route('pet.index') }}">Pets</a>
      {{-- <a class="navbar-brand" href="{{ route('breed.index') }}">Breeds</a>
      <a class="navbar-brand" href="{{ route('disease.index') }}">Diseases</a> --}}
      <a class="navbar-brand" href="{{ route('service.index') }}">Grooming Services</a>
    </div>
     <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
               {{--  <li>
                   <a class="navbar-brand" href="{{ route('customer.index') }}">Customer</a>
       
                </li> --}}
          {{-- @if (Auth::check())
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-circle">
                  </i><strong>{{Auth::user()->name}}</strong><span class="caret"></span></a> --}}
                  
         {{-- <ul class="dropdown-menu"> --}}
             {{--  @if (Auth::check()) --}}
              {{-- <li>
                
                <a href="{{ route('employee.index') }}"><strong>{{Auth::user()->name}}</strong></a></li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="{{ route('user.logout') }}">Logout</a>
              </li>
            @else
              <li><a href="{{ route('user.signup') }}">Signup</a></li>
              <li><a href="{{ route('user.signin') }}">Signin</a></li>
            @endif
          </ul>
        </li> --}}
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>