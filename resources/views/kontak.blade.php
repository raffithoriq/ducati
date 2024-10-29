@extends('layouts.app')

@section('content')
    <!-- Kontak Section -->
    <section class="container mt-5">
        <h1 class="text-center mb-5">Kontak Kami</h1>
        <form id="kontakForm">
            <div class="mb-3">
                <label for="first-name" class="form-label">Nama depan:</label>
                <input type="text" class="form-control" id="first-name" name="first-name" required>
            </div>
            <div class="mb-3">
                <label for="last-name" class="form-label">Nama belakang:</label>
                <input type="text" class="form-control" id="last-name" name="last-name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Alamat email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan anda:</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-danger" id="submitBtn">Kirim</button>
        </form>
    </section>

@endsection