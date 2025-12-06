@extends('layouts.app')

@section('title', 'Ubah Pengguna')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ubah Pengguna <span class="fw-bold">{{ $user->name }}</span></h5>

          <form action="{{ route('pengguna.update', $user) }}" method="POST" id="editForm">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap"
                value="{{ $user->name }}" required>
              <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email"
                value="{{ $user->email }}" required>
              <label for="email">Alamat Email <span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
              <label for="password">Kata Sandi <span class="text-danger">*</span></label>
              <div class="form-text">Kosongkan kata sandi jika tidak ingin diubah</div>
            </div>

            <div class="form-floating mb-3">
              <input type="password_confirmation" class="form-control" name="password_confirmation"
                id="password_confirmation" placeholder="Konfirmasi Kata Sandi">
              <label for="password_confirmation">Konfirmasi Kata Sandi <span class="text-danger">*</span></label>
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
