@extends('dashboard.layouts.app')

@section('content-main')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
             <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                   <div class="d-flex flex-wrap align-items-center">
                        <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                             <img src="{{asset($user->images[0]->path)}}" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100">
                        </div>
                        <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                            <h4 class="me-2 h4">{{auth()->user()->name}}</h4>
                            <span> - Web Developer</span>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3"> </div>
    <div class="col-lg-6">
        <div class="card">
            @if (Session::get('success'))
                <div class="alert alert-left alert-success alert-dismissible fade show mb-3" role="alert">
                    <span>{{ Session::get('success') }}</span>
                    <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" 
                    aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-left alert-danger alert-dismissible fade show mb-3" role="alert">
                    <span> {{ session('error') }}</span>
                    <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card-header">
               <div class="header-title">
                  <h4 class="card-title">Update Profile</h4>
               </div>
        </div>
        <div class="card-body">
            <div class="text-center">
                <div class="user-profile">
                    <img src="{{asset($user->images[0]->path)}}" alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                </div>
            </div>
            <div class="mt-3">
                <form method="post" action="{{ route('admin.profile.update', Auth::id() ) }} " enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <input type="file" value="{{$user->images[0]->path ?? old('image')}}" name="image" class="form-control form-control-lg" aria-label="Large file input example">
                        <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                    
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" style="border-color: black" value="{{Auth::user()->name ?? old('name')}}" required>
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" style="border-color: black" value="{{Auth::user()->email ?? old('email')}}" required>
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>                    
                    </div>

                    <div class="col-12 mt-2">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
                <hr>
           
                <form method="post" action="{{route('admin.profile.changePwd',Auth::id() ) }}">
                    @method('PATCH')
                    @csrf
        
                    <div class="form-group">
                        <label for="password">Current Password</label>
                        <input type="password" class="form-control" name="current_password" placeholder="Enter your current password">
                        <span class="text-danger">@error('current_password'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="new_cpassword" placeholder="confirm password" >
                        <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
            
                </form>

            </div>
            
        </div>             
    </div>
    <div class="col-lg-3"> </div>
</div>
@endsection