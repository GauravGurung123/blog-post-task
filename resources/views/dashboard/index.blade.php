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
                            <span> - {{auth()->user()->email}}</span>
                            <a href="{{route('admin.profile.edit', Auth::id() )}}">&nbsp;Update my profile</a>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection
