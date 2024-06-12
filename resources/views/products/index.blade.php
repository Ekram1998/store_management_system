@extends('layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Products List</li>
                        </li>
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
                            <h4 class="card-title">Products List</h4> <br>
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-plus"></i> Add Product</a> <br> <br>
                            {{-- table --}}
                            <div class="table-responsive">
                                <table class="table table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Stock (SKU)</th>
                                            <th>Category Name</th>
                                            <th>Brand Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($products)
                                            @foreach ($products as $product)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>
                                                        <img src="{{asset($product->image)}}" alt="img" style="width: 60px; height: 60px">
                                                    </td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->sku}}</td>
                                                    <td>{{$product->category->name}}</td>
                                                    <td>{{$product->brand->name}}</td>
                                                    <td>
                                                        {{-- show all details --}}
                                                        <a href="{{ route('products.show', $product->id) }}"
                                                            class="btn btn-sm btn-success"><i
                                                                class="fa fa-eye"></i> Show</a>
                                                        {{-- Edit --}}
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>

                                                        {{-- Delete --}}
                                                        <form class="inner" method="POST"
                                                            action="{{ route('products.destroy', $product->id) }}"
                                                            accept-charset="UTF-8" style="display:inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                title="Delete Student"
                                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i>
                                                                Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
