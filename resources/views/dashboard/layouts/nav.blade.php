<div class="position-relative iq-banner">
    <!--Nav Start-->
        <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
            <div class="container-fluid navbar-inner">
              <a href="../dashboard/index.html" class="navbar-brand">
                  <!--Logo start-->
                  <svg width="30" class="text-primary" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                      <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                      <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                      <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                  </svg>
                  <!--logo End-->        <h4 class="logo-title">Hope UI</h4>
              </a>
              <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                  <i class="icon">
                   <svg width="20px" height="20px" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                  </svg>
                  </i>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <span class="mt-2 navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                  </span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">

                  <li class="nav-item dropdown">
                    <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{-- <img src="{{asset($user->images[0]->path)}}" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded"> --}}
                      <img src="{{asset($user->images[0]->path)}}" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                      <div class="caption ms-3 d-none d-md-block ">
                          <h6 class="mb-0 caption-title">{{auth()->user()->name}}</h6>  
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="../dashboard/app/user-profile.html">Profile</a></li>
                      <li><a class="dropdown-item" href="../dashboard/app/user-privacy-setting.html">Privacy Setting</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a>
                      
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>  
          <!-- Nav Header Component Start -->
          <div class="iq-navbar-header" style="height: 215px; background: rgb(2,0,36);
          background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(16,106,194,1) 100%, rgba(0,212,255,1) 100%);">
            <div class="container-fluid iq-container">
              <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Hello Devs!</h1>
                            <p>We are on a mission to help developers like you build successful projects for FREE.</p>
                        </div>                            
                    </div>
                </div>
              </div>
            </div>
        </div>          <!-- Nav Header Component End -->
      <!--Nav End-->
    </div>