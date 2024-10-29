@extends('layouts.appadmin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="text-center my-3">
                <a href="/admin/category/add" class="btn btn-primary btn-wide" role="button">Add Category</a>
            </div>

            @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
            @endsession


            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->keterangan }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('/admin/category/' . $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
