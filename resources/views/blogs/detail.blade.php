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
                            Blog   Details
                        </h2>
                        <ol class="breadcrumb main-bg">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active">{{$blog->name}}</li>
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
 <div class="iq-blog-section overview-block-ptb">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 col-sm-12 mt-lg-0 mt-5">
             <article id="post-218" class="post-218 post type-post status-publish format-standard has-post-thumbnail hentry category-marketing tag-business tag-marketing">
                <div class="iq-blog-box">
                   <div class="iq-blog-image clearfix">
                      <img  src="{{asset('vendor/images/blog/blog-1.jpg')}}" class="img-fluid" alt="qloud" />
                   </div>
                   <div class="iq-blog-detail">
                      <div class="iq-blog-meta">
                         <ul class="iq-postdate">
                            <li class="list-inline-item">
                               <i class="fa fa-calendar mr-2"></i>
                               <span class="screen-reader-text">Posted on</span> <a href="javascript:void(0)" rel="bookmark"><time class="entry-date published updated" datetime="2020-02-17T06:44:40+00:00">February 17, 2020</time></a>
                            </li>
                         </ul>
                      </div>
                      <div class="blog-content">
                         <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English.</p>
                      </div>
                   </div>
                </div>
          
             </article>
             <!-- #post-## -->
          </div>
          <div class="col-lg-4 col-sm-12 mt-lg-0 mt-5">
             <aside id="secondary" class="widget-area" aria-label="Blog Sidebar">
                <div id="search-2" class="widget widget_search">
                   <form method="get" class="search-form" action="#">
                      <label for="search-form-5e875eae921cb">
                      <span class="screen-reader-text">Search for:</span>
                      </label>
                      <input type="search" id="search-form-5e875eae921cb" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                      <button type="submit" class="search-submit"><i class="fa fa-search"></i><span class="screen-reader-text">Search</span></button>
                   </form>
                </div>
                <div class="widget widget_categories">
                   <h4 class="widget-title">Recent Posts</h4>
                   <ul>
                       @foreach ($blogs as $blog)                           
                       <li class="cat-item">
                           <a href="{{route('blog.detail', $blog->slug)}}">{{$blog->name}}</a>
                       </li>
                       @endforeach
                   </ul>
                </div>
                <div class="widget widget_categories">
                   <h4 class="widget-title">Categories</h4>
                   <ul>
                    @foreach ($categories as $category)                           
                    <li class="cat-item">
                        <a href="{{route('blog.category', $category->slug)}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                   </ul>
                </div>
             </aside>
             <!-- #secondary -->
          </div>
       </div>
       <!-- #row -->
    </div>
 </div>

@endsection