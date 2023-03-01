@extends('layouts.master')
@section('title')
    Add Category
@endsection
@section('content')
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h4><b>Add Category</b></h4>
        </div>
        <div class="card-body">
            <form action="" method="POST" id="addCategoryForm">
                @csrf
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter category name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}*</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary" id="addCategory">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection