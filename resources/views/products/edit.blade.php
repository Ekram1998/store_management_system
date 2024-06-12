@extends('layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title">Edit Product</h5> <br>

                            <form action="{{ route('products.update', $product->id) }}" method="post" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">

                                        {{-- user id --}}
                                        <label for="">User Name</label>
                                        <select name="user_id" id="user_id" class="form-control">
                                            @foreach ($users as $id => $user)
                                                <option value="{{ $id }}">{{ $user }}</option>
                                            @endforeach
                                        </select>
                                        <br>

                                        {{-- category id --}}
                                        <label for="">Category Name</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach ($categories as $id => $category)
                                                <option value="{{ $id }}">{{ $category }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        {{-- brand id --}}
                                        <label for="">Brand Name</label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            @foreach ($brands as $id => $brand)
                                                <option value="{{ $id }}">{{ $brand }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        {{-- name --}}
                                        <label for="">Product Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $product->name }}" placeholder="Enter Product Name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                        <br>
                                        {{-- stock-keeping unit --}}
                                        <label for="">stock-keeping unit</label>
                                        <input type="text" name="sku" class="form-control"
                                            value="{{ $product->sku }}" placeholder="Enter stock-keeping unit">
                                        <br>
                                        {{-- image file upload  --}}
                                        <label class="form-label">Product Image</label>
                                        <input class="form-control" name="image" type="file"
                                            value="{{ $product->image ? $product->image : '' }}">
                                        <br>
                                        <img src="{{ asset($product->image) }}" alt="img"
                                            style="width: 200px; height: 100px; margin-left:15px; padding:5px"">

                                        {{-- @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif --}}

                                        <br>
                                        {{-- size id --}}
                                        <label for="">Product Size</label>
                                        <select name="size_id" id="size_id" class="form-control">
                                            @foreach ($sizes as $id => $size)
                                                <option value="{{ $id }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        {{-- cost price --}}
                                        <label for="">Cost Price</label>
                                        <input type="text" name="cost_price" class="form-control"
                                            value="{{ $product->cost_price }}">
                                        <br>
                                        {{-- retail price --}}
                                        <label for="">Retail Price</label>
                                        <input type="text" name="retail_price" class="form-control"
                                            value="{{ $product->retail_price }}">
                                        <br>
                                        {{-- year --}}
                                        <label for="">Year</label>
                                        <input type="text" name="year" class="form-control"
                                            value="{{ $product->year }}">
                                        <br>
                                        {{-- description --}}
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" name="description" value="{{ $product->description }}"></textarea>
                                        <br>
                                        {{-- status --}}
                                        <label for="">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">In Active</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                        Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#profilePhoto').change(function(e) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#showPhoto').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
</script>
