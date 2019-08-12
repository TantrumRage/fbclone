<nav id="main-nav" class="navbar navbar-expand-md navbar-dark fixed-top bg-darker pl-md-5 pr-md-5 pl-0 pr-0 border-light-gray">
  <a class="navbar-brand d-none d-md-block" href="{{ url('/') }}">
    {{ config('app.name', 'fbclone') }}
  </a>  
@guest
  <a class="navbar-brand d-block d-md-none p-2" href="{{ url('/') }}">
    {{ config('app.name', 'fbclone') }}
  </a>
@else
  <li class="nav-item d-sm-block d-md-none col-2 p-0 custom-nav-items-sm">
    <a class="nav-link text-center text-light w-100" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
  </li>

  <li class="nav-item d-sm-block d-md-none col-2 p-0 custom-nav-items-sm pointer">
    <div class="dropdown">
      <a id="showFriendRequests" class="nav-link text-center text-light w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-friends"></i>
        </button>  
      </a>
      
      <div class="dropdown-menu bg-darker" aria-labelledby="showFriendRequests" style="width: 350px;">
        @if(count(auth()->user()->friendRequests) != 0)
          @foreach(auth()->user()->friendRequests as $request)
            <span class="dropdown-item text-light">
              <div class="row">
                <div class="col-6">
                  {{$request->user->fname}} {{$request->user->lname}}
                </div>
                <div class="col-6">
                  <div class="row">
                    <div class="col-6 pr-1 text-right">
                      <button class="btn btn-sm btn-primary accept-request" data-user="{{$request->user->profile->nickname}}">Accept</button>
                    </div>
                    <div class="col-6 pl-1">
                      <button class="btn btn-sm btn-primary decline-request" data-user="{{$request->user->profile->nickname}}">Decline</button>
                    </div>
                  </div>
                </div>
              </div>
            </span>
          @endforeach
        @else
          <div class="text-light text-center">
            You have no friend requests.
          </div>
        @endif
      </div>
    </div>  
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
            <a class="nav-link text-center" href="/{{ Auth::user()->profile->nickname }}">{{ Auth::user()->fname }}</a>
          </li>

          <li class="nav-item d-none d-md-block custom-nav-items-md">
            <a class="nav-link text-center" href="/">Home</a>
          </li>

          <li class="nav-item d-none d-md-block custom-nav-items-md pointer">
            <div class="dropdown">
              <a id="showFriendRequests" class="nav-link text-center text-light w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-friends"></i>
                </button>  
              </a>
              
              <div class="dropdown-menu" aria-labelledby="showFriendRequests">
                <a class="dropdown-item" href="#">Action</a>
              </div>
            </div>  
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