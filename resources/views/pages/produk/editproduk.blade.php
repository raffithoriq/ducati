@extends('layouts.appadmin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="p-3 d-flex justify-content-center">
                <a href="/admin/produk" class="btn btn-primary btn-wide" role="button">Kembali</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (@session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mb-5">
                <div class="col-md-12">
                    <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group">
                                <label class="text-black">Upload Foto</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <div class="w-50 mt-3">
                                    @if ($product->foto_produk)
                                        <img src="{{ route('admin.show-image', $product->foto_produk) }}" alt=""
                                            class="w-25 rounded">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Nama Produk <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_name"
                                    value="{{ old('product_name', $product->name) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Product Price (Rp) <span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" name="price"
                                    value="{{ old('price', $product->harga) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Kategori Produk <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Deskripsi Produk</label>
                                <textarea name="description" cols="30" rows="7" class="form-control">{{ old('description', $product->deskripsi) }}</textarea>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-lg-12">
                                    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block"
                                        value="Simpan">
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
