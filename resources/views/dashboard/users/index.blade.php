@extends('dashboard.layouts.app')

@section('content-main')
@if(session('success'))
<div class="bd-example">
    <div class="alert alert-left alert-success alert-dismissible fade show mb-3" role="alert">
        <span>{{ session('success') }} </span>
        <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
@if(session('error'))
<div class="bd-example">
    <div class="alert alert-left alert-danger alert-dismissible fade show mb-3" role="alert">
        <span> {{ session('error') }}</span>
        <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
<div class="row">
    <div class="col-sm-12">
       <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">All Users
                    <a href="#" class="btn btn-sm btn-success">
                    <svg width="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    
                    <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                    <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                    Add User</a>
                </h4> 
            </div>
          </div>
          <div class="card-body p-0">
             <div class="table-responsive mt-4">
                <table id="basic-table" class="table table-striped mb-0" role="grid">
                   <thead>
                      <tr>
                        <th>S/N</th>
                        <th>User Name</th>
                        <th>Email</th>
                      </tr>
                   </thead>
                   <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <h6>{{$user->name}}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <h6>{{$user->email}}</h6>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td>No User Yet</td></tr>
                    @endforelse
                   </tbody>

                </table>
                {{$users->links()}}
                <style>
                  .w-5{display: none;}
                </style>
             </div>
          </div>
       </div>
    </div>
</div>
@endsection