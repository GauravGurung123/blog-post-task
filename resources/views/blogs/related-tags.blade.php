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
                            All Blog Of Tag {{$title}}  
                        </h2>
                        <ol class="breadcrumb main-bg">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active">Tag: {{$title}}</li>
                        </ol>
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
            <div class="iq-blog text-left ">
                <div class="row">
                    @foreach ($tags as $blog)                        
                    <div class="col-lg-4 col-md-6">
                        <div class="iq-blog-box">
                            <div class="iq-blog-image clearfix">
                                <img src="{{asset('vendor/images/blog/blog-1.jpg')}}" alt="#">
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
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <ul class="page-numbers">
                    <li><span aria-current="page" class="page-numbers current">1</span></li>
                    <li><a class="page-numbers" href="#">2</a></li>
                    <li><a class="next page-numbers" href="#">Next page</a></li>
                    </ul>
            </div>
        </div>
    </div>
</section>
@endsection