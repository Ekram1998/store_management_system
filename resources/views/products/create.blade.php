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
                        <li class="breadcrumb-item active">Create Product</li>
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
                            <h5 class="card-title">Create Product</h5> <br>

                            <form action="{{ url('/products') }}" method="post" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">

                                        {{-- user id --}}
                                        <label for="">User Name</label>
                                        <select name="user_id" id="user_id" class="form-control">
                                            <option>Select User Name</option>
                                            @foreach ($users as $id => $user)
                                                <option value="{{ $id }}">{{ $user }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('user_id'))
                                            <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                        @endif
                                        <br>

                                        {{-- category id --}}
                                        <label for="">Category Name</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category Name</option>
                                            @foreach ($categories as $id => $category)
                                                <option value="{{ $id }}">{{ $category }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        @endif
                                        <br>
                                        {{-- brand id --}}
                                        <label for="">Brand Name</label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option value="">Select Brand Name</option>
                                            @foreach ($brands as $id => $brand)
                                                <option value="{{ $id }}">{{ $brand }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('brand_id'))
                                            <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                        @endif
                                        <br>
                                        {{-- name --}}
                                        <label for="">Product Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Product Name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                        <br>
                                        {{-- stock-keeping unit --}}
                                        <label for="">stock-keeping unit</label>
                                        <input type="text" name="sku" class="form-control"
                                            placeholder="Enter stock-keeping unit">
                                        @if ($errors->has('sku'))
                                            <span class="text-danger">{{ $errors->first('sku') }}</span>
                                        @endif
                                        <br>
                                        {{-- image file upload  --}}
                                        <label class="form-label">Product Image</label>
                                        <input class="form-control" name="image" type="file">
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                        <br>
                                        {{-- size id --}}
                                        <label for="">Product Size</label>
                                        <select name="size_id" id="size_id" class="form-control">
                                            <option value="">Select Product Size</option>
                                            @foreach ($sizes as $id => $size)
                                                <option value="{{ $id }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('size_id'))
                                            <span class="text-danger">{{ $errors->first('size_id') }}</span>
                                        @endif
                                        <br>
                                        {{-- cost price --}}
                                        <label for="">Cost Price</label>
                                        <input type="text" name="cost_price" class="form-control"
                                            placeholder="Enter Product Cost Price">
                                        @if ($errors->has('cost_price'))
                                            <span class="text-danger">{{ $errors->first('cost_price') }}</span>
                                        @endif
                                        <br>
                                        {{-- retail price --}}
                                        <label for="">Retail Price</label>
                                        <input type="text" name="retail_price" class="form-control"
                                            placeholder="Enter Product Retail Price">
                                        @if ($errors->has('retail_price'))
                                            <span class="text-danger">{{ $errors->first('retail_price') }}</span>
                                        @endif
                                        <br>
                                        {{-- year --}}
                                        <label for="">Year</label>
                                        <input type="text" name="year" class="form-control"
                                            placeholder="Product Stock Year">
                                        @if ($errors->has('year'))
                                            <span class="text-danger">{{ $errors->first('year') }}</span>
                                        @endif
                                        <br>
                                        {{-- description --}}
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" name="description" placeholder="Please Enter The Product Details"></textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                        <br>
                                        {{-- status --}}
                                        <label for="">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Select Product Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">In Active</option>
                                        </select>
                                        @if ($errors->has('user_id'))
                                            <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                        Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
