@extends('layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product Info</li>
                        {{-- <li class="breadcrumb-item active"><a href="{{ route('categories.create') }}">Category Create</a> --}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h4 class="card-title">Product Info</h4> <br> <br>

                            {{-- table --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{$product->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Category Name</th>
                                        <td>{{$product->category->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Brand Name</th>
                                        <td>{{$product->brand->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Stock(SKU)</th>
                                        <td>{{$product->sku}}</td>
                                    </tr>
                                    <tr>
                                        <th>Cost Price</th>
                                        <td>{{$product->cost_price}}</td>
                                    </tr>
                                    <tr>
                                        <th>Retail Price Price</th>
                                        <td>{{$product->retail_price}}</td>
                                    </tr>
                                    <tr>
                                        <th>Year</th>
                                        <td>{{$product->year}}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{$product->description}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{$product->status}}</td>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h4 class="card-title">Product Image</h4> <br> <br>

                            {{-- table --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <img src="{{asset($product->image)}}" alt="img" style="width: 450px; height: 220px; margin-left:15px">
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
