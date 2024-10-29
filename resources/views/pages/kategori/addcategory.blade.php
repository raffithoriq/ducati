@extends('layouts.appadmin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="p-3 d-flex justify-content-center">
                <a href="/admin/category" class="btn btn-primary btn-wide" role="button">Kembali</a>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    @if (@session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ url('/admin/category/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group">
                                <label class="text-black">Nama Category <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Deskripsi Category</label>
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
