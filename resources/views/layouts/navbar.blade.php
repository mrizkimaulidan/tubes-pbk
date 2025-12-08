<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
  <div class="container">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav w-100">
        <a class="nav-link active" href="{{ route('dashboard') }}">
          <i class="bi bi-speedometer2 me-1"></i> Dashboard
        </a>
        <a class="nav-link" href="{{ route('kopi.index') }}">
          <i class="bi bi-cup-straw me-1"></i> Daftar Kopi
        </a>
        <a class="nav-link" href="{{ route('kriteria.index') }}">
          <i class="bi bi-clipboard-data me-1"></i> Daftar Kriteria
        </a>
        <a class="nav-link" href="{{ route('pengguna.index') }}">
          <i class="bi bi-person-badge me-1"></i> Daftar Pengguna
        </a>

        <!-- This will push to right -->
        <div class="nav-link ms-auto">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="modeSwitchToggle">
            <label class="form-check-label" for="modeSwitchToggle">
              <!-- Initial icon -->
              <i class="bi bi-moon-stars-fill" id="modeSwitchToggleIcon"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
