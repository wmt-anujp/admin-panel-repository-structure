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
            <form action="{{route('add.Category')}}" method="POST" id="addCategoryForm">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="pcategory" class="form-label">Select Parent Category</label>
                        <select class="form-select" name="pcategory" id="pcategory">
                        </select>
                        @if ($errors->has('pcategory'))
                            <span class="text-danger">{{ $errors->first('pcategory') }}*</span>
                        @endif
                    </div>

                    <div class="col-sm-4 mt-sm-0 mt-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name">
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
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        // category
        $.ajax({
            url:"{{route('getCategories')}}",
            dataType:'json',
            type:'GET',
            success:function(response){
                let category=response?.category;
                let categoryData;
                category && category.length>0 && category.map(e=>categoryData+=`<option value=${e.id}>${e.name}</option>\n`);
                $('#pcategory').html('<option selected disabled>Select Parent Category</option>\n'+categoryData);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>
<script src="{{URL::to('src/js/category/categoryValidation.js')}}"></script>
@endsection