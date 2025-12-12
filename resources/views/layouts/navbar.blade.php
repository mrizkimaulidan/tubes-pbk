<nav class="navbar navbar-expand-lg bg-body border-bottom sticky-top mb-5">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">
      <i class="bi bi-cup-hot-fill text-warning me-1"></i>
      {{ config('app.name') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav w-100">
        <a class="nav-link {{ request()->routeIs('rekomendasi.index') ? 'active fw-semibold' : '' }}"
          href="{{ route('rekomendasi.index') }}">
          <i class="bi bi-magic me-1"></i> Rekomendasi
        </a>

        @auth
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}"
          href="{{ route('dashboard') }}">
          <i class="bi bi-speedometer2 me-1"></i> Dashboard
        </a>
        <a class="nav-link {{ request()->routeIs('kopi.*') ? 'active fw-semibold' : '' }}"
          href="{{ route('kopi.index') }}">
          <i class="bi bi-cup-straw me-1"></i> Daftar Kopi
        </a>
        <a class="nav-link {{ request()->routeIs('kriteria.*') ? 'active fw-semibold' : '' }}"
          href="{{ route('kriteria.index') }}">
          <i class="bi bi-clipboard-data me-1"></i> Daftar Kriteria
        </a>
        <a class="nav-link {{ request()->routeIs('pengguna.*') ? 'active fw-semibold' : '' }}"
          href="{{ route('pengguna.index') }}">
          <i class="bi bi-person-badge me-1"></i> Daftar Pengguna
        </a>
        <a class="nav-link {{ request()->routeIs('pertanyaan.*') ? 'active fw-semibold' : '' }}"
          href="{{ route('pertanyaan.index') }}">
          <i class="bi bi-question-circle me-1"></i> Daftar Pertanyaan
        </a>
        @endauth

        <!-- Right aligned controls: dark mode + auth -->
        <div class="ms-auto d-flex align-items-center gap-3">
          <div class="form-check form-switch d-flex align-items-center mb-0">
            <input class="form-check-input me-2" type="checkbox" id="modeSwitchToggle">
            <label class="form-check-label mb-0" for="modeSwitchToggle">
              <i class="bi bi-moon-stars-fill" id="modeSwitchToggleIcon"></i>
            </label>
          </div>

          @if (Route::has('login'))
          @auth
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle p-0 d-inline-flex align-items-center" href="#" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle me-1"></i>
              <span class="d-inline-block text-truncate" style="max-width:9rem;" title="{{ auth()->user()->name }}">{{
                auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>
                  Pengaturan</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                </form>
              </li>
            </ul>
          </div>
          @else
          <div>
            <a class="btn btn-warning btn-sm d-inline-flex align-items-center" href="{{ route('login') }}">
              <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
          </div>
          @endauth
          @endif
        </div>
      </div>
    </div>
  </div>
</nav>
