<!-- Header -->
<header id="main-header" class="header-main bg-dark">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('home')}}">
            <img class="img-fluid" src="{{ asset('vendor/images/logo.png') }}" alt="img">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-btn d-inline-block" id="menu-btn">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
            </span>
            <span class="ion-navicon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is(['home','/']) ? 'active' : '' }}" href="{{route('home')}}" >
                        Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('blog/categories/*') ? 'active' : '' }}" href="javascript:void(0)" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown-2">
                        @foreach ($categories as $category)                        
                            <a class="dropdown-item" href="{{route('blog.category', $category->slug)}}">{{$category->name}}</a>
                        @endforeach
                        </div>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('blog/tags/*') ? 'active' : '' }}" href="javascript:void(0)" id="navbarDropdown-3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tags
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown-3">
                            @foreach ($tags as $tag)                                
                            <a class="dropdown-item" href="{{route('blog.tag', $tag->slug)}}">{{$tag->name}}</a>
                            @endforeach

                        </div>
                    </li>
                    
                    <!-- Authentication Links -->
                   @guest
                   @if (Route::has('login'))
                       <li class="nav-item">
                           <a class="nav-link {{ request()->is(['login']) ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                       </li>
                   @endif

                   @if (Route::has('register'))
                       <li class="nav-item">
                           <a class="nav-link {{ request()->is(['register']) ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                       </li>
                   @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profile.edit', Auth::id())}}">
                                My Profile
                            </a>   
                            <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
            </div>
            </nav>
        </div>
    </div>
</div>
</header>
<!-- Header End -->