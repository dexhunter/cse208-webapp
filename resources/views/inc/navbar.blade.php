<nav class="navbar navbar-expand-md navbar-dark bg-info">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse offset-md-3" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="/"><button class="btn btn-primary disabled">GLUE</button></a>
    <ul class="navbar-nav mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/orgs">Organisation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/acts">Activity</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control ml-md-5 mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>

  <!-- Right Side Of Navbar -->
  <ul class="navbar-nav mt-2 mt-lg-0">
      <!-- Authentication Links -->
      @if (Auth::guest())
  <a type="button" class="btn btn-primary mr-2"  href="{{ route('login')}}">Login</a>
  <a type="button" class="btn btn-primary" href="{{route('register')}}">Register</a>
      @else
          <div class="dropdown">
                <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                      </div>
            </div>
      @endif
  </ul>
</nav>