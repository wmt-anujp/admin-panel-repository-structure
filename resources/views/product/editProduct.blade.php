@extends('layouts.master')
@section('title')
    Edit Product
@endsection
@section('content')
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h4><b>Edit Product</b></h4>
        </div>
        <div class="card-body">
            <form action="" method="POST" id="editProductForm" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="pcategory" class="form-label">Select Category</label>
                        <select class="form-select" name="pcategory[]" id="pcategory" multiple></select>
                        @if ($errors->has('pcategory'))
                            <span class="text-danger">{{ $errors->first('pcategory') }}*</span>
                        @endif
                    </div>

                    <div class="col-sm-4 mt-sm-0 mt-4">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}" placeholder="Enter Product's Name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}*</span>
                        @endif
                    </div>

                    <div class="col-sm-4 mt-sm-0 mt-4">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$product->title}}" placeholder="Enter Product's Title">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}*</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="1" placeholder="Enter Product's Description">{{$product->description}}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}*</span>
                        @endif
                    </div>

                    <div class="col-sm-4 mt-sm-0 mt-4">
                        <label for="base_price" class="form-label">Base Price</label>
                        <input type="text" class="form-control" name="base_price" id="base_price" value="{{$product->base_price}}" placeholder="Enter Product's Base Price">
                        @if ($errors->has('base_price'))
                            <span class="text-danger">{{ $errors->first('base_price') }}*</span>
                        @endif
                    </div>

                    <div class="col-sm-4 mt-sm-0 mt-4">
                        <label for="disc_price" class="form-label">Discounted Price</label>
                        <input type="text" class="form-control" name="disc_price" id="disc_price" value="{{$product->discounted_price}}" placeholder="Enter Product's Discounted Price">
                        @if ($errors->has('disc_price'))
                            <span class="text-danger">{{ $errors->first('disc_price') }}*</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="product_image" class="form-label">Product Image</label>
                        <input type="file" name="product_image[]" id="product_image" class="form-control" multiple>
                        @if ($errors->has('product_image'))
                            <span class="text-danger">{{ $errors->first('product_image') }}*</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary" id="updateProduct">Update Product</button>
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
                let existingCategory=JSON.parse("{{$category}}");
                category && category.length>0 && category.map(e=>categoryData+=`<option value=${e.id}
                ${existingCategory.includes(e.id) ? "selected" : ""}>${e.name}</option>\n`);
                $('#pcategory').html(categoryData);
            },
            error: function(error) {
                console.log(error);
            }
        });

        $("#pcategory").select2({
            placeholder: "Select Category",
            allowClear: true
        });
    });
</script>
<script src="{{URL::to('src/js/product/productValidation.js')}}"></script>
@endsection