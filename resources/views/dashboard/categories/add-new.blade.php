@extends('dashboard.layouts.app')

@section('content-main')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
        
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Add New Category</h4>
                </div>
            </div>
            
            <div class="card-body">

                <div class="bd-example">
                    <form method="post" action="{{ route('admin.categories.store') }}">
                        @method('POST')
                        @csrf
                        <div class="col-md-6">
                            <label for="category class="form-label">Category (<small>use comma to insert multiple category</small>)</label>
                            <input type="text" class="form-control" name="name" style="border-color: black" required>
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