@extends('layouts.appadmin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="p-3 d-flex justify-content-center">
                <a href="/admin/pelanggan" class="btn btn-primary btn-wide" role="button">Kembali</a>
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
                    <form action="{{ url('/admin/pelanggan/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group">
                                <label class="text-black">Upload Foto <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image" accept="image/*" value="{{ old('image') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="fullname" required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Gender<span class="text-danger">*</span></label>
                                <select name="gender" class="form-control" required>
                                    <option value="" disabled selected>Pilih Gender</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Call Number<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" name="callnumber" required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Address</label>
                                <textarea name="address" cols="30" rows="7" class="form-control"></textarea>
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
