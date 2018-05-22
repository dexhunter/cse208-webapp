<style>
  .dropdown:hover>.dropdown-menu {
  display: block;
}
  </style>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
          <a class="navbar-brand" href="/"><img src="/logo.png" alt="" style="height:40px;"> </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/acts" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Activity
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  {{-- <a class="dropdown-item" href=" {{url('acts/category', ['category_no'=>1])}} ">Lecture</a> --}}
                  <a class="dropdown-item" href="/acts">All</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/acts/category/0">Lecture</a>
                  <a class="dropdown-item" href="/acts/category/1">Charity</a>
                  <a class="dropdown-item" href="/acts/category/2">Career</a>
                  <a class="dropdown-item" href="/acts/category/3">Outdoors</a>
                  <a class="dropdown-item" href="/acts/category/4">Competition</a>
                  <a class="dropdown-item" href="/acts/category/5">Exhibition</a>
                  <a class="dropdown-item" href="/acts/category/6">Other</a>
                  {{-- <div class="dropdown-divider"></div> --}}
                </div>
              </li>
          </ul>
        </div>



          <form action="/search" method="post" role="search" class="form-inline col-auto">
            @csrf
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search Activity by Title">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-warning" value="Search">
                  <span class="fa fa-search">
                  </span>
                </button>
              </span>
            </div>
          </form>

      
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav">
            <!-- Authentication Links -->
            @if (Auth::guest())
              <a type="button" class="btn btn-primary mx-3"  href="{{ route('login')}}">Login</a>
              <a type="button" class="btn btn-primary" href="{{route('register')}}">Register</a>
            @else
                <div class="dropdown">
                      <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
      
                      <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="/dashboard">Dashboard</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                  Logout</a>
      
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                            </div>
                  </div>
            @endif
        </ul>


  </div>
      </nav>

      <script>
        $('body').on('mouseenter mouseleave','.dropdown',function(e){
        var _d=$(e.target).closest('.dropdown');
        _d.addClass('show');
        setTimeout(function(){
          _d[_d.is(':hover')?'addClass':'removeClass']('show');
          $('[data-toggle="dropdown"]', _d).attr('aria-expanded',_d.is(':hover'));
        },300);
      });
        </script>