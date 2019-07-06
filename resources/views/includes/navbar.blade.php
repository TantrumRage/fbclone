<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark pl-md-5 pr-md-5 pl-0 pr-0">
  <a class="navbar-brand d-none d-md-block" href="{{ url('/') }}">
    {{ config('app.name', 'Laravel') }}
  </a>  
@guest
  <a class="navbar-brand d-block d-md-none p-2" href="{{ url('/') }}">
    {{ config('app.name', 'Laravel') }}
  </a> 
@else
  <li class="nav-item d-sm-block d-md-none col-2 p-0 custom-nav-items-sm">
    <a class="nav-link text-center text-light w-100" href="#"><i class="fas fa-home"></i></a>
  </li>

  <li class="nav-item d-sm-block d-md-none col-2 p-0 custom-nav-items-sm">
    <a class="nav-link text-center text-light w-100" href="#"><i class="fas fa-user-friends"></i></a>
  </li>

  <li class="nav-item d-sm-block d-md-none col-2 p-0 custom-nav-items-sm">
    <a class="nav-link text-center text-light w-100" href="#"><i class="fab fa-facebook-messenger"></i></a>
  </li>

  <li class="nav-item d-sm-block d-md-none col-2 p-0 custom-nav-items-sm">
    <a class="nav-link text-center text-light w-100" href="#"><i class="fas fa-bell"></i></a>
  </li>

  <li class="nav-item d-sm-block d-md-none col-2 p-0 custom-nav-items-sm">
    <a class="nav-link text-center text-light w-100" href="#"><i class="fas fa-search"></i></a>
  </li>
@endguest
  
    <button class="navbar-toggler col-2 border-0" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <!-- Left side of navbar -->
      <div class="mb-sm-2 mt-md-2 m-auto" id="nav-search-container">
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control col-10" id="nav-search-bar" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0 col-2" id="nav-search-btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>

    <!-- Right side of navbar -->
    <ul class="navbar-nav ml-auto">   
      <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link text-center" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link text-center" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          
          <li class="nav-item custom-nav-items-md">
            <a class="nav-link text-center" href="#">{{ Auth::user()->fname }}</a>
          </li>

          <li class="nav-item d-none d-md-block custom-nav-items-md">
            <a class="nav-link text-center" href="#">Home</a>
          </li>

          <li class="nav-item d-none d-md-block custom-nav-items-md">
            <a class="nav-link text-center" href="#"><i class="fas fa-user-friends"></i></a>
          </li>

          <li class="nav-item d-none d-md-block custom-nav-items-md">
            <a class="nav-link text-center" href="#"><i class="fab fa-facebook-messenger"></i></a>
          </li>

          <li class="nav-item d-none d-md-block custom-nav-items-md">
            <a class="nav-link text-center" href="#"><i class="fas fa-bell"></i></a>
          </li>

          <li class="nav-item dropdown d-none d-md-block custom-nav-items-md">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">     {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>

          <li class="nav-item d-md-none d-sm-block">
            <a class="nav-link text-center font-weight-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
          </li>
        @endguest
        </ul>
    </form>
  </div>
</nav>