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
                    <form action="{{ route('admin.pelanggan.update', $pelanggan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group">
                                <label class="text-black">Upload Foto</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <div class="w-50 mt-3">
                                    @if ($pelanggan->foto_profil)
                                        <img src="{{ route('admin.show-image', $pelanggan->foto_profil) }}" alt=""
                                            class="w-25 rounded">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="fullname"
                                    value="{{ old('fullname', $pelanggan->nama_lengkap) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Gender<span class="text-danger">*</span></label>
                                <select name="gender" class="form-control" required>
                                    <option value="Laki-Laki"
                                        {{ $pelanggan->jenis_kelamin == 'Laki-Laki' ? 'selected' : null }}>Laki-Laki
                                    </option>
                                    <option value="Perempuan"
                                        {{ $pelanggan->jenis_kelamin == 'Perempuan' ? 'selected' : null }}>Perempuan
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" value="{{ $pelanggan->email }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Call Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="callnumber" value="{{ $pelanggan->no_hp }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="text-black">Adress</label>
                                <textarea name="address" cols="30" rows="7" class="form-control">{{ old('address', $pelanggan->alamat) }}</textarea>
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
