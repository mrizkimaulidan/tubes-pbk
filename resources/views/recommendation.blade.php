@extends('layouts.app')

@section('title', 'Rekomendasi')

@section('content')
<div class="container">
  <div class="row g-4">
    <!-- Filter Sidebar -->
    <div class="col-12 col-lg-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="d-flex align-items-center mb-4">
            <i class="bi bi-funnel fs-4 text-primary me-3"></i>
            <h5 class="card-title mb-0 fw-semibold">Cari Rekomendasi</h5>
          </div>

          <form action="{{ route('rekomendasi.calculate') }}" method="POST">
            @csrf

            @foreach ($surveyQuestions as $question)
            <div class="mb-4">
              <label class="form-label fw-medium mb-2">{{ $question->content }}</label>
              <select name="answers[]" class="form-select" required>
                <option value="" disabled selected>Pilih Jawaban</option>
                @foreach ($question->surveyQuestionOptions as $option)
                <option value="{{ $option->value }}">
                  {{ $option->label }} - {{ $option->description }}
                </option>
                @endforeach
              </select>
            </div>
            @endforeach

            <div class="mt-4 pt-3 border-top">
              <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
                <i class="bi bi-magic me-2"></i>Cari Rekomendasi
              </button>
              <button type="reset" class="btn btn-outline-secondary w-100 mt-2 py-2">
                <i class="bi bi-arrow-clockwise me-2"></i>Reset
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Results Section -->
    <div class="col-12 col-lg-8">
      <!-- Header -->
      <div
        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 p-3 bg-body-tertiary rounded-3">
        <div class="mb-3 mb-md-0">
          <h4 class="fw-bold mb-1">
            <i class="bi bi-cup-hot-fill text-warning me-2"></i>Hasil Rekomendasi
          </h4>
          <p class="text-muted mb-0">
            <i class="bi bi-info-circle me-1"></i>Berdasarkan preferensi Anda
          </p>
        </div>

        <div class="d-flex flex-wrap gap-2">
          <div class="dropdown">
            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-sort-down me-2"></i>Urutkan
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item active" href="#"><i class="bi bi-check-lg me-2"></i>Relevansi</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-star me-2"></i>Rating Tertinggi</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-cash-coin me-2"></i>Harga Terendah</a></li>
            </ul>
          </div>

          <div class="vr d-none d-md-block"></div>

          <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="viewMode" id="gridView" autocomplete="off" checked>
            <label class="btn btn-outline-secondary btn-sm" for="gridView">
              <i class="bi bi-grid-3x3-gap"></i>
            </label>
            <input type="radio" class="btn-check" name="viewMode" id="listView" autocomplete="off">
            <label class="btn btn-outline-secondary btn-sm" for="listView">
              <i class="bi bi-list"></i>
            </label>
          </div>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
        @forelse ($coffees as $index => $coffee)
        <div class="col">
          <div class="card h-100 shadow-sm border-0">
            <div class="position-relative overflow-hidden">
              <img src="https://picsum.photos/400/300?random={{ $index }}" class="card-img-top img-fluid"
                alt="{{ $coffee['name'] }}" style="height:220px; object-fit:cover;">

              <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2">
                Rank #{{ $coffee['rank'] }}
              </span>

              <span class="badge bg-success position-absolute top-0 end-0 m-3 px-3 py-2">
                <i class="bi bi-award me-1"></i> {{ $coffee['match_percentage'] }}%
              </span>
            </div>

            <div class="card-body p-4">
              <h5 class="fw-bold mb-2">
                <i class="bi bi-cup-hot text-warning me-2"></i>
                {{ $coffee['name'] }}
              </h5>

              <div class="mb-3">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                  <i class="bi bi-graph-up me-1"></i>
                  Nilai Preferensi: <strong>{{ $coffee['preference_value'] }}</strong>
                </span>
              </div>

              <p class="text-secondary mb-4">{{ $coffee['description'] }}</p>

              <div class="bg-body-secondary bg-opacity-50 rounded-3 p-3 mb-3">
                <div class="row g-2">
                  <div class="col-12">
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-cash-stack text-success me-2"></i>
                      <span class="fw-medium">{{ $coffee['formatted_price'] }}</span>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-star-fill text-warning me-2"></i>
                      <div>
                        <small class="text-muted d-block">Rasa</small>
                        <span class="fw-medium">{{ $coffee['taste'] }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-cup-hot text-danger me-2"></i>
                      <div>
                        <small class="text-muted d-block">Intensitas</small>
                        <span class="fw-medium">{{ $coffee['intensity'] }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-droplet-half text-primary me-2"></i>
                      <div>
                        <small class="text-muted d-block">Sweetness</small>
                        <span class="fw-medium">{{ $coffee['sweetness'] }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-cup-straw text-secondary me-2"></i>
                      <div>
                        <small class="text-muted d-block">Milk Level</small>
                        <span class="fw-medium">{{ $coffee['milk_level'] }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 mt-2">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-wind text-info me-2"></i>
                      <div>
                        <small class="text-muted d-block">Tipe Kopi</small>
                        <span class="fw-medium">{{ $coffee['beans_type'] }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12">
          <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
              <div class="mb-3">
                <i class="bi bi-cup-hot text-light bg-primary bg-opacity-25 p-3 rounded-circle fs-1"></i>
              </div>
              <h5 class="fw-semibold text-muted mb-2">Belum ada rekomendasi</h5>
              <p class="text-muted mb-0">
                Isi formulir untuk melihat rekomendasi kopi.
              </p>
            </div>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection
