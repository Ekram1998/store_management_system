@extends('layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sizes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Size List</li>
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
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h4 class="card-title">Size List</h4> <br>
                            <a href="{{ route('sizes.create') }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-plus"></i> Add Size</a> <br> <br>
                            {{-- table --}}
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sizes)
                                        @foreach ($sizes as $size)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $size->size ?? '' }}</td>
                                                <td>
                                                    {{-- Edit --}}
                                                    <a href="{{ route('sizes.edit', $size->id) }}"
                                                        class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>

                                                    {{-- Delete --}}
                                                    <form class="inner" method="POST"
                                                        action="{{ route('sizes.destroy', $size->id) }}"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Student"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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
@endsection
