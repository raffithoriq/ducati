@extends('layouts.appadmin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="text-center my-3">
                <a href="/admin/produk/add" class="btn btn-primary btn-wide" role="button">Add Product</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" width="200px">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <img src="{{ route('admin.show-image', $product->foto_produk) }}" alt=""
                                            class="w-100 rounded">
                                    </td>
                                    <td>{{ $product->deskripsi }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/produk/' . $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No products available</td>
                                </tr>
                            @endforelse
                            <!-- More products can be added similarly -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
