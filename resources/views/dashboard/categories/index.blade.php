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
                <h4 class="card-title">Categories Table
                    <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-success">
                    <svg width="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    
                    <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                    <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                    Add category</a>
                </h4> 
            </div>
          </div>
          <div class="card-body p-0">
             <div class="table-responsive mt-4">
                <table id="basic-table" class="table table-striped mb-0" role="grid">
                   <thead>
                      <tr>
                          <th>S/N</th>
                         <th>Categories</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <h6>{{$category->name}}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center mb-2">
                                    <a href="{{route('admin.categories.edit', $category->slug)}}" class="btn-outline-info m-1">                                        
                                        <svg width="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.7476 20.4428H21.0002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.78 3.79479C13.5557 2.86779 14.95 2.73186 15.8962 3.49173C15.9485 3.53296 17.6295 4.83879 17.6295 4.83879C18.669 5.46719 18.992 6.80311 18.3494 7.82259C18.3153 7.87718 8.81195 19.7645 8.81195 19.7645C8.49578 20.1589 8.01583 20.3918 7.50291 20.3973L3.86353 20.443L3.04353 16.9723C2.92866 16.4843 3.04353 15.9718 3.3597 15.5773L12.78 3.79479Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M11.021 6.00098L16.4732 10.1881" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                                    Edit&nbsp;
                                    </a>
                                    <form action="{{route('admin.categories.destroy',['category'=> $category->id])}}" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn-outline-danger m-1">
                                            <svg width="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">                                    
                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                            <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                            <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                          
                                            &nbsp;Del
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td>No Category Yet</td></tr>
                    @endforelse
                   </tbody>

                </table>
                {{$categories->links()}}
                <style>
                  .w-5{display: none;}
                </style>
             </div>
          </div>
       </div>
    </div>
</div>
@endsection