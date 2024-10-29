@extends('layouts.appadmin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="p-3 d-flex justify-content-center">
                <a href="/admin/category" class="btn btn-primary btn-wide" role="button">Kembali</a>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    {{-- Display success message if exists --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                        </div>
                        <div class="form-group">
                                <label class="text-black">Deskripsi Category</label>
                                <textarea name="description" cols="30" rows="7" value="{{ $category->keterangan }}" class="form-control">{{ old('description', $category->keterangan) }}</textarea>
                        </div>
                        <div class="form-group row mb-0">
                                <div class="col-lg-12">
                                    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


