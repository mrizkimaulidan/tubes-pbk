@extends('layouts.app')

@section('title', 'Temukan Kopi Sempurna')

@section('content')
<!-- Hero -->
<section class="py-5 bg-dark text-white">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold mb-3">
          <i class="bi bi-cup-hot text-warning"></i>
          Temukan Kopi Sempurna
        </h1>
        <p class="mb-4 text-white-50">Sistem rekomendasi kopi cerdas untuk selera Anda.</p>
        <a href="{{ route('rekomendasi.index') }}" class="btn btn-warning btn-lg">
          <i class="bi bi-magic me-2"></i>Coba Sekarang
        </a>
      </div>
      <div class="col-lg-6">
        <img
          src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
          class="img-fluid rounded-3" alt="Coffee">
      </div>
    </div>
  </div>
</section>

<!-- Features -->
<section class="py-5 bg-body text-body">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
          <i class="bi bi-cpu-fill text-warning fs-2"></i>
        </div>
        <h5>AI Recommendations</h5>
        <p class="text-body-secondary">Rekomendasi personal berdasarkan preferensi Anda.</p>
      </div>
      <div class="col-md-4 mb-4">
        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
          <i class="bi bi-cup-straw text-warning fs-2"></i>
        </div>
        <h5>Variasi Luas</h5>
        <p class="text-body-secondary">Berbagai jenis kopi untuk setiap kesempatan.</p>
      </div>
      <div class="col-md-4 mb-4">
        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
          <i class="bi bi-award-fill text-warning fs-2"></i>
        </div>
        <h5>Kualitas Premium</h5>
        <p class="text-body-secondary">Biji kopi pilihan dari perkebunan terbaik.</p>
      </div>
    </div>
  </div>
</section>

<!-- Coffee Preview -->
<section class="py-5 bg-body-tertiary">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">
      <i class="bi bi-cup-hot-fill text-warning me-2"></i>
      Kopi Populer
    </h2>

    <div class="row g-4">
      @foreach ($coffees as $coffee)
      <!-- Coffee 1 -->
      <div class="col-md-4">
        <div class="card h-100 border">
          <img src="{{ asset('storage/' . $coffee->image_url) }}" class="card-img-top" alt="{{ $coffee->name }}"
            style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title fw-bold">
              <i class="bi bi-cup-hot text-warning me-2"></i>{{ $coffee->name }}
            </h5>
            <p class="card-text text-body-secondary">
              <i class="bi bi-flower1 text-success me-2"></i>
              {{ $coffee->description }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="h5 fw-bold">
                <i class="bi bi-cash-stack text-success me-2"></i>
                {{ $coffee->formatted_price }}
              </span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 bg-dark text-white text-center">
  <div class="container">
    <h2 class="fw-bold mb-3">
      <i class="bi bi-cup-hot text-warning me-2"></i>
      Siap Menemukan Kopi Sempurna?
    </h2>
    <p class="mb-4 text-white-50">Temukan minuman favorit Anda dengan sistem rekomendasi kami.</p>
    <a href="{{ route('rekomendasi.index') }}" class="btn btn-warning btn-lg">
      <i class="bi bi-magic me-2"></i>Mulai Rekomendasi
    </a>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
  <div class="container text-center">
    <p class="mb-2">
      <i class="bi bi-cup-hot-fill text-warning me-2"></i>
      {{ config('app.name') }}
    </p>
    <p class="text-white-50 small">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
  </div>
</footer>
@endsection
