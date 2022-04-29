@extends('layouts.app')

@section('content-main')
    <section class="iq-blog-section iq-pb-55">
        <div class="container">
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
                        <div class="alert alert-left alert-danger alert-dismissible fade show mb-3" role="alert">
                        @if (session('error'))
                                <span> {{ session('error') }}</span>
                                <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
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
                                    <img src="{{ asset($user->images[0]->path) }}" alt="profile-img"
                                        class="rounded-circle" style="width: 50%; height:50%">
                                </div>
                            </div>
                        
                            <form method="post" action="{{ route('profile.update', Auth::id()) }} "
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="custom-file mt-2">
                                    <input type="file" class="custom-file-input" name="image" id="customFile">
                                    <label class="custom-file-label" for="customFile">change profile picture</label>
                                    @error('image')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-group" name="name"
                                    value="{{ Auth::user()->name ?? old('name') }}" required>
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-group" name="email"
                                    value="{{ Auth::user()->email ?? old('email') }}" required>
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                        
                            </form>

                            <hr style="border: 2px solid whitesmoke; margin: 2%">

                            <form method="post" action="{{ route('profile.changePwd', Auth::id()) }}">
                                @method('PATCH')
                                @csrf

                                <div class="form-group">
                                    <label for="password">Current Password</label>
                                    <input type="password" class="form-group" name="current_password"
                                        placeholder="Enter your current password">
                                    <span class="text-danger">
                                        @error('current_password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-group" name="new_password"
                                        placeholder="Enter new password">
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-group" name="new_cpassword"
                                        placeholder="confirm password">
                                    <span class="text-danger">
                                        @error('cpassword')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>

                            </form>


                        </div>
                    </div>
                    <div class="col-lg-3"> </div>
                </div>
            </div>
    </section>
    <style>
        input {
            background-color: whitesmoke
        }
    </style>
    <!-- Jquery Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
