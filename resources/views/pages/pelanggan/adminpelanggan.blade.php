@extends('layouts.appadmin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="text-center my-3">
                <a href="/admin/pelanggan/add" class="btn btn-primary btn-wide" role="button">Add User</a>
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
                                        <th scope="col" width="200px">Foto</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">call Nunmber</th>
                                        <th scope="col">Adress</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $user)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $user->nama_lengkap }}</td>
                                            <td>
                                                @if ($user->foto_profil != null)
                                                    <img src="{{ route('admin.show-image', $user->foto_profil) }}"
                                                        alt="" class="w-100 rounded">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->jenis_kelamin != null)
                                                {{ $user->jenis_kelamin }}
                                                @endif
                                            </td>
                                            <td>
                                                {{ $user->email }} 
                                            </td>
                                            <td>
                                                @if ($user->no_hp!= null)
                                                {{ $user->no_hp }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->alamat!= null)
                                                {{ $user->alamat }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.pelanggan.edit', $user->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ url('/admin/pelanggan/' . $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
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
