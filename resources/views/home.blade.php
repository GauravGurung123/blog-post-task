@extends('layouts.app')
@section('content-bread')
<!-- Breadcrumb Start -->
<div class=" main-bg" >
    <div class="container-fluid p-0">
        <div class="text-left iq-breadcrumb-one
            iq-bg-over black     ">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                        <h2 class="title">
                            Search
                        </h2>
                        <div class="widget bg-dark">
                            <form method="get" class="search-form">
                               <input type="search" name="blog_search" class="search-field"
                                placeholder="Search using blog title&hellip;" value="{{$blog_search}}" />
                               <button type="submit" class="search-submit">
                                   <i class="fa fa-search"></i></button>
                            </form>
                         </div>
                    </nav>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
@endsection

@section('content-main')
<!-- Blog Start -->
<section class="iq-blog-section iq-pb-55">
    <div class="container">
        <div class="row">
            {{-- @dd($blogs->images()) --}}
            <div class="iq-blog text-left ">
                <div class="row">
                    @forelse ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="iq-blog-box">
                            <div class="iq-blog-image clearfix">
                                @foreach ($blog->images as $image)
                                    
                                <img src="{{asset($image->path)}}" alt="No Image">
                                @endforeach
                            </div>
                            <div class="iq-blog-detail">
                                <div class="blog-title">
                                    <a href="{{route('blog.detail', $blog->slug)}}">
                                    <h4 class="mb-3">{{$blog->name}}</h4>
                                    </a>
                                </div>
                                <p class="iq-desc">{!! $blog->description !!}</p>
                                <div class="blog-footer">
                                    <div class="iq-blog-meta">
                                    <ul class="iq-postdate">
                                        <li class="list-inline-item">
                                            <i class="fa fa-calendar mr-1" aria-hidden="true"></i> <a href="#">{{$blog->created_at}}</a>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="blog-button">
                                    <a class="iq-link-button" href="blog-details.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                    @empty
                    <h1> No Blog Yet </h1>              
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row">
            {{-- {{$blogs->links()}} --}}
            <style>
                .w-5{display: none;}
            </style>
        </div>
        {{-- <div class="row">
            <div class="col-lg-12 text-center">
                <ul class="page-numbers">
                    <li><span aria-current="page" class="page-numbers current">1</span></li>
                    <li><a class="page-numbers" href="#">2</a></li>
                    <li><a class="next page-numbers" href="#">Next page</a></li>
                    </ul>
            </div>
        </div> --}}
    </div>
</section>
@endsection

