@extends('layouts.appadmin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="p-3 d-flex justify-content-center">
                <a href="/admin/produk" class="btn btn-primary btn-wide" role="button">Kembali</a>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
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

                    <form action="{{ url('/admin/produk/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group">
                                <label class="text-black">Upload Gambar <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image" required
                                    value="{{ old('image') }}">
                            </div>
                            <div class="form-group">
                                <label class="text-black">Nama Produk <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_name" required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Product Price (Rp) <span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" name="price" required>
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
                                <textarea name="description" cols="30" rows="7" class="form-control"></textarea>
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
