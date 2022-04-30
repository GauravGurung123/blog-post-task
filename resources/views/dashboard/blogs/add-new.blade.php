@extends('dashboard.layouts.app')

@section('content-main')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
        
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Add New Blog Post</h4>
                </div>
            </div>
            
            <div class="card-body">

                <div class="bd-example">
                    <form method="post" action="{{ route('admin.blogs.store') }}">
                        @method('POST')
                        @csrf
                        <div class=" form-group">
                            <label for="category" class="form-label">Title</label>
                            <input type="text" class="form-control" name="name" style="border-color: black" value="{{old('name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Description</label>                
                            <div class="controls">
                                <textarea name="description" id="blog-description" class="form-control"
                                    rows="5" aria-invalid="false">{{ old('description') }}</textarea>
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Select Categories</label>
                            <select class="form-select multiple-category" multiple name="category[]">
                                @forelse ($categories as $category)
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
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @empty
                                <option disabled>No Tag Yet</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="0">Select Post Status</option>
                                <option value="1">Published</option>
                                <option value="0">Draft</option>
                                
                            </select>
                        </div>
                        <div class="col-12 mt-2">
                            <button class="btn btn-primary" type="submit">Create</button>
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
    // closeOnSelect: false,
    placeholder: "Select a category"
});
$(".multiple-tags").select2({
    // closeOnSelect: false,
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
