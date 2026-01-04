@extends('layouts.app')

@section('title', 'Halaman Dashboard')

@section('content')
<div class="container">
  <!-- Header Dashboard -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="mb-1">Dashboard</h4>
      <p class="text-muted mb-0">Selamat datang kembali, {{ auth()->user()->name }}!</p>
    </div>
    <div>
      <span class="badge bg-info-subtle text-info-emphasis">
        <i class="bi bi-calendar3 me-1"></i>{{ now()->translatedFormat('l, d F Y') }}
      </span>
    </div>
  </div>

  <!-- Statistik Cards -->
  <div class="row g-3 mb-4">
    <!-- Total Pengguna -->
    <div class="col-xl-3 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="text-muted mb-2">Total Pengguna</h6>
              <h3 class="fw-bold mb-0">{{ $userCount ?? 24 }}</h3>
              <div class="small mt-2">
                <span class="text-success">
                  <i class="bi bi-arrow-up-right me-1"></i>12.5%
                </span>
                <span class="text-muted">dari bulan lalu</span>
              </div>
            </div>
            <div class="bg-primary-subtle p-3 rounded">
              <i class="bi bi-people fs-4 text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Kopi -->
    <div class="col-xl-3 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="text-muted mb-2">Total Kopi</h6>
              <h3 class="fw-bold mb-0">{{ $coffeeCount ?? 15 }}</h3>
              <div class="small mt-2">
                <span class="text-success">
                  <i class="bi bi-arrow-up-right me-1"></i>8.3%
                </span>
                <span class="text-muted">dari bulan lalu</span>
              </div>
            </div>
            <div class="bg-success-subtle p-3 rounded">
              <i class="bi bi-cup-hot fs-4 text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Kriteria -->
    <div class="col-xl-3 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="text-muted mb-2">Total Kriteria</h6>
              <h3 class="fw-bold mb-0">{{ $criteriaCount ?? 5 }}</h3>
              <div class="small mt-2">
                <span class="text-info">Tetap stabil</span>
                <span class="text-muted">dari bulan lalu</span>
              </div>
            </div>
            <div class="bg-warning-subtle p-3 rounded">
              <i class="bi bi-bar-chart fs-4 text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Pertanyaan Survey -->
    <div class="col-xl-3 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="text-muted mb-2">Pertanyaan Survey</h6>
              <h3 class="fw-bold mb-0">{{ $surveyQuestionsCount ?? 10 }}</h3>
              <div class="small mt-2">
                <span class="text-success">
                  <i class="bi bi-arrow-up-right me-1"></i>5.2%
                </span>
                <span class="text-muted">dari bulan lalu</span>
              </div>
            </div>
            <div class="bg-info-subtle p-3 rounded">
              <i class="bi bi-chat-left-text fs-4 text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4">
    <!-- Grafik atau Chart (Left Column) -->
    <div class="col-xl-8">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h6 class="mb-0">Aktivitas Terbaru</h6>
            <select class="form-select form-select-sm w-auto">
              <option>Minggu ini</option>
              <option>Bulan ini</option>
              <option>Tahun ini</option>
            </select>
          </div>

          <!-- Placeholder untuk chart -->
          <div class="text-center py-5 bg-light rounded">
            <i class="bi bi-bar-chart-line fs-1 text-muted mb-3"></i>
            <p class="text-muted">Grafik aktivitas akan ditampilkan di sini</p>
            <small class="text-muted">Integrasi dengan library chart seperti Chart.js</small>
          </div>

          <!-- Activity List -->
          <div class="mt-4">
            <h6 class="mb-3">Aktivitas Sistem</h6>
            <div class="list-group list-group-flush">
              <div class="list-group-item d-flex align-items-center px-0">
                <div class="bg-success-subtle rounded p-2 me-3">
                  <i class="bi bi-plus-circle text-success"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="fw-semibold">Kopi baru ditambahkan</div>
                  <small class="text-muted">"Espresso Double Shot" ditambahkan oleh Admin</small>
                </div>
                <small class="text-muted">2 jam yang lalu</small>
              </div>
              <div class="list-group-item d-flex align-items-center px-0">
                <div class="bg-primary-subtle rounded p-2 me-3">
                  <i class="bi bi-person-plus text-primary"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="fw-semibold">Pengguna baru terdaftar</div>
                  <small class="text-muted">User "Budi Santoso" berhasil mendaftar</small>
                </div>
                <small class="text-muted">5 jam yang lalu</small>
              </div>
              <div class="list-group-item d-flex align-items-center px-0">
                <div class="bg-warning-subtle rounded p-2 me-3">
                  <i class="bi bi-pencil-square text-warning"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="fw-semibold">Kriteria diperbarui</div>
                  <small class="text-muted">Kriteria "Harga" berhasil diupdate</small>
                </div>
                <small class="text-muted">Kemarin</small>
              </div>
              <div class="list-group-item d-flex align-items-center px-0">
                <div class="bg-info-subtle rounded p-2 me-3">
                  <i class="bi bi-chat-left-text text-info"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="fw-semibold">Pertanyaan survey ditambahkan</div>
                  <small class="text-muted">Pertanyaan baru untuk kriteria "Rasa"</small>
                </div>
                <small class="text-muted">2 hari yang lalu</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Links & Info (Right Column) -->
    <div class="col-xl-4">
      <!-- Quick Actions -->
      <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
          <h6 class="mb-3">Aksi Cepat</h6>
          <div class="row g-2">
            <div class="col-6">
              <a href="{{ route('kopi.create') }}" class="btn btn-outline-primary w-100 text-start">
                <i class="bi bi-plus-circle me-2"></i>
                <div class="small">Tambah Kopi</div>
              </a>
            </div>
            <div class="col-6">
              <a href="{{ route('kriteria.create') }}" class="btn btn-outline-success w-100 text-start">
                <i class="bi bi-plus-circle me-2"></i>
                <div class="small">Tambah Kriteria</div>
              </a>
            </div>
            <div class="col-6">
              <a href="{{ route('pertanyaan.create') }}" class="btn btn-outline-warning w-100 text-start">
                <i class="bi bi-plus-circle me-2"></i>
                <div class="small">Tambah Pertanyaan</div>
              </a>
            </div>
            <div class="col-6">
              <a href="{{ route('pengguna.create') }}" class="btn btn-outline-info w-100 text-start">
                <i class="bi bi-plus-circle me-2"></i>
                <div class="small">Tambah Pengguna</div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- System Info -->
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="mb-3">Informasi Sistem</h6>
          <div class="list-group list-group-flush">
            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Versi Sistem</span>
              <span class="fw-semibold">v1.2.0</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Status Database</span>
              <span class="badge bg-success">Normal</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Waktu Server</span>
              <span class="fw-semibold">{{ now()->format('H:i') }}</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span class="text-muted">Total Data</span>
              <span class="fw-semibold">54 record</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Coffee (Hardcoded) -->
      <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0">Kopi Terbaru</h6>
            <a href="{{ route('kopi.index') }}" class="btn btn-sm btn-outline-secondary">Lihat Semua</a>
          </div>

          <div class="list-group list-group-flush">
            <!-- Kopi 1 -->
            <div class="list-group-item d-flex align-items-center px-0">
              <div class="bg-light rounded d-flex align-items-center justify-content-center me-3"
                style="width: 40px; height: 40px;">
                <i class="bi bi-cup text-muted"></i>
              </div>
              <div class="flex-grow-1">
                <div class="fw-semibold">Espresso Double Shot</div>
                <small class="text-muted">Rp 35.000</small>
              </div>
              <span class="badge bg-primary-subtle text-primary-emphasis">Baru</span>
            </div>

            <!-- Kopi 2 -->
            <div class="list-group-item d-flex align-items-center px-0">
              <div class="bg-light rounded d-flex align-items-center justify-content-center me-3"
                style="width: 40px; height: 40px;">
                <i class="bi bi-cup text-muted"></i>
              </div>
              <div class="flex-grow-1">
                <div class="fw-semibold">Caramel Macchiato</div>
                <small class="text-muted">Rp 45.000</small>
              </div>
            </div>

            <!-- Kopi 3 -->
            <div class="list-group-item d-flex align-items-center px-0">
              <div class="bg-light rounded d-flex align-items-center justify-content-center me-3"
                style="width: 40px; height: 40px;">
                <i class="bi bi-cup text-muted"></i>
              </div>
              <div class="flex-grow-1">
                <div class="fw-semibold">Vanilla Latte</div>
                <small class="text-muted">Rp 42.000</small>
              </div>
            </div>

            <!-- Kopi 4 -->
            <div class="list-group-item d-flex align-items-center px-0">
              <div class="bg-light rounded d-flex align-items-center justify-content-center me-3"
                style="width: 40px; height: 40px;">
                <i class="bi bi-cup text-muted"></i>
              </div>
              <div class="flex-grow-1">
                <div class="fw-semibold">Mocha Frappe</div>
                <small class="text-muted">Rp 48.000</small>
              </div>
            </div>
          </div>

          <div class="mt-3 text-center">
            <small class="text-muted">
              <i class="bi bi-info-circle me-1"></i>
              Total 15 produk kopi tersedia
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Section - Quick Stats -->
  <div class="row g-4 mt-3">
    <!-- Top Kriteria -->
    <div class="col-md-6">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="mb-3">Kriteria Paling Penting</h6>
          <div class="list-group list-group-flush">
            @php
            $topCriteria = [
            ['name' => 'Harga', 'weight' => 0.25, 'type' => 'cost'],
            ['name' => 'Rasa', 'weight' => 0.20, 'type' => 'benefit'],
            ['name' => 'Kualitas Biji', 'weight' => 0.18, 'type' => 'benefit'],
            ['name' => 'Popularitas', 'weight' => 0.15, 'type' => 'benefit'],
            ['name' => 'Ketersediaan', 'weight' => 0.12, 'type' => 'cost'],
            ];
            @endphp

            @foreach($topCriteria as $criteria)
            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
              <div>
                <span class="fw-semibold">{{ $criteria['name'] }}</span>
                <span class="badge ms-2 bg-{{ $criteria['type'] == 'benefit' ? 'primary' : 'secondary' }}-subtle
                       text-{{ $criteria['type'] == 'benefit' ? 'primary' : 'secondary' }}-emphasis">
                  {{ $criteria['type'] }}
                </span>
              </div>
              <span class="badge bg-info-subtle text-info-emphasis">
                Bobot: {{ $criteria['weight'] }}
              </span>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <!-- User Activity -->
    <div class="col-md-6">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="mb-3">Pengguna Aktif</h6>
          <div class="list-group list-group-flush">
            @php
            $activeUsers = [
            ['name' => 'Admin', 'last_active' => 'Baru saja', 'role' => 'admin'],
            ['name' => 'Budi Santoso', 'last_active' => '2 jam lalu', 'role' => 'user'],
            ['name' => 'Sari Dewi', 'last_active' => '5 jam lalu', 'role' => 'user'],
            ['name' => 'Ahmad Fauzi', 'last_active' => 'Kemarin', 'role' => 'user'],
            ['name' => 'Lisa Amelia', 'last_active' => '2 hari lalu', 'role' => 'user'],
            ];
            @endphp

            @foreach($activeUsers as $user)
            <div class="list-group-item d-flex align-items-center px-0">
              <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3"
                style="width: 36px; height: 36px;">
                <i class="bi bi-person text-muted"></i>
              </div>
              <div class="flex-grow-1">
                <div class="fw-semibold">{{ $user['name'] }}</div>
                <small class="text-muted">Aktif {{ $user['last_active'] }}</small>
              </div>
              <span class="badge bg-{{ $user['role'] == 'admin' ? 'warning' : 'secondary' }}-subtle
                     text-{{ $user['role'] == 'admin' ? 'warning' : 'secondary' }}-emphasis">
                {{ $user['role'] }}
              </span>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
