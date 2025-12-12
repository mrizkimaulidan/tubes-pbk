@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <div class="text-center mb-4">
            <i class="bi bi-cup-hot-fill text-warning fs-1"></i>
            <h4 class="mt-2 fw-bold">Login to {{ config('app.name') }}</h4>
            <p class="text-body-secondary">Masuk untuk mengelola data dan melihat rekomendasi</p>
          </div>

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Alamat email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Masukan alamat email"
                required autofocus value="{{ old('email') }}">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Kata sandi</label>
              <input type="password" name="password" id="password" placeholder="Masukan kata sandi Anda"
                class="form-control" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
              </div>
              <a href="#" class="small text-decoration-none">Lupa kata sandi?</a>
            </div>

            <button class="btn btn-warning w-100 mb-2" type="submit">
              <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </button>

            {{-- <div class="text-center small text-body-secondary">Belum punya akun? @if(Route::has('register'))<a
                href="{{ route('register') }}">Daftar</a>@else<a href="#">Hubungi admin</a>@endif</div> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
