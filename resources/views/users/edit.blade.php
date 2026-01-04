@extends('layouts.app')

@section('title', 'Ubah Pengguna')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Ubah Pengguna: <span class="text-primary">{{ $user->name }}</span></h5>
            <a href="{{ route('pengguna.index') }}" class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
          </div>

          @include('partials.alert')

          <form action="{{ route('pengguna.update', $user) }}" method="POST" id="editForm">
            @csrf
            @method('PUT')

            <div class="row g-3">
              <!-- Informasi Dasar -->
              <div class="col-12">
                <div class="card border-0 bg-light-subtle">
                  <div class="card-body">
                    <h6 class="mb-3 pb-2 border-bottom">
                      <i class="bi bi-person-circle me-2"></i>Informasi Dasar
                    </h6>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Nama Lengkap" value="{{ old('name', $user->name) }}" required>
                          <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                          @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Alamat Email" value="{{ old('email', $user->email) }}" required>
                          <label for="email">Alamat Email <span class="text-danger">*</span></label>
                          @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Kata Sandi (Opsional) -->
              <div class="col-12">
                <div class="card border-0 bg-light-subtle">
                  <div class="card-body">
                    <h6 class="mb-3 pb-2 border-bottom">
                      <i class="bi bi-shield-lock me-2"></i>Ubah Kata Sandi (Opsional)
                    </h6>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password" placeholder="Kata Sandi">
                          <label for="password">Kata Sandi Baru</label>
                          @error('password')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-text">Minimal 8 karakter</div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Kata Sandi">
                          <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                          @error('password_confirmation')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <small class="text-muted">
                        <i class="bi bi-info-circle me-1"></i>
                        Kosongkan kedua field jika tidak ingin mengubah kata sandi
                      </small>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol Aksi -->
              <div class="col-12">
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                  <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle me-1"></i> Batal
                  </a>
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
