@extends('layouts.app')

@section('title', 'Halaman Dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="row">

      <!-- Simple Card 1 -->
      <div class="col-md-3 mb-3">
        <div class="card text-center p-3">
          <i class="bi bi-people fs-3 text-primary mb-2"></i>
          <h6 class="text-muted">Total Pengguna</h6>
          <h4 class="fw-bold">1,254</h4>
        </div>
      </div>

      <!-- Simple Card 2 -->
      <div class="col-md-3 mb-3">
        <div class="card text-center p-3">
          <i class="bi bi-bar-chart fs-3 text-success mb-2"></i>
          <h6 class="text-muted">Revenue</h6>
          <h4 class="fw-bold">$24.5K</h4>
        </div>
      </div>

      <!-- Simple Card 3 -->
      <div class="col-md-3 mb-3">
        <div class="card text-center p-3">
          <i class="bi bi-cart fs-3 text-warning mb-2"></i>
          <h6 class="text-muted">Orders</h6>
          <h4 class="fw-bold">845</h4>
        </div>
      </div>

      <!-- Simple Card 4 -->
      <div class="col-md-3 mb-3">
        <div class="card text-center p-3">
          <i class="bi bi-eye fs-3 text-info mb-2"></i>
          <h6 class="text-muted">Views</h6>
          <h4 class="fw-bold">5,421</h4>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
