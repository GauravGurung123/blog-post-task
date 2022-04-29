@extends('dashboard.layouts.app')

@section('content-main')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
        
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Upadate Blog</h4>
                </div>
            </div>
            
            <div class="card-body">

                <div class="bd-example">
                    <form method="post" action="{{ route('admin.blogs.update', $blog->slug) }}">
                        @method('PUT')
                        @csrf
                        <div class=" form-group">
                            <label for="category" class="form-label">Title</label>
                            <input type="text" class="form-control" name="name" style="border-color: black" value="{{$blog->name ?? old('name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Description</label>                
                            <div class="controls">
                                <textarea name="description" id="blog-description" class="form-control"
                                    rows="5" aria-invalid="false">{{$blog->description ?? old('description') }}</textarea>
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Select Categories</label>
                            <select class="form-select multiple-category" multiple name="category[]">
                                @forelse ($categories as $key=>$category)

                                        @foreach ($blog->categories as $c)
                                            <option value="{{$c->id}}" {{ $category->id == $c->id ? 'selected' : '' }}>{{$c->name}}</option>
                                        @endforeach

                                    {{-- <option value="{{ $category->id }}" {{ $category->id == $c ? 'selected' : '' }}>{{ $category->name }}</option>                                 --}}
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @empty
                                    <option disabled>No category Yet</option>
                                @endforelse    
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Select Tags</label>
                            <select class="form-select multiple-tags" multiple name="tag[]">
                                @forelse ($tags as $tag)
                                    @foreach ($blog->tags as $t)
                                        <option value="{{$t->id}}" {{ $tag->id == $t->id ? 'selected' : '' }}>{{$c->name}}</option>
                                    @endforeach
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @empty
                                    <option disabled>No Tag Yet</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="{{$blog->status}}" selected>
                                    @if($blog->status==0)Draft @else Published @endif
                                </option>                        
                                <option value="1">Published</option>
                                <option value="0">Draft</option>
                                
                            </select>
                        </div>
                        <div class="col-12 mt-2">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content-script')
<script>

// Multiple Select
$(".multiple-category").select2({
    closeOnSelect: false,
    placeholder: "Select a category"
});
$(".multiple-tags").select2({
    closeOnSelect: false,
    placeholder: "Select tags"
});

// CKeditor Section
ClassicEditor
.create( document.querySelector( '#blog-description' ) )
.catch( error => {
    console.error( error );
});

</script>
@endsection
