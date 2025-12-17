@extends('layouts.app')

@section('title', 'Rekomendasi')

@section('content')
    <div class="container">
        <div class="row g-4">
            <!-- Filter Sidebar -->
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-funnel fs-4 text-primary me-3"></i>
                            <h5 class="card-title mb-0 fw-semibold">Cari Rekomendasi</h5>
                        </div>

                        {{-- tambahin route --}}
                        <form action="{{ route('rekomendasi.calculate') }}" method="POST">
                            @csrf

                            {{-- @foreach ($SurveyQuestion as $question)
            <div class="mb-4">
              <label class="form-label fw-medium mb-2 text-body">
                <i class="bi bi-question-circle text-primary me-2"></i>
                {{ $question->content }}
              </label>
              <select class="form-select" aria-label="Pilih jawaban untuk {{ $question->content }}">
                <option value="" selected disabled>
                  <i class="bi bi-chevron-down me-2"></i>Pilih Jawaban
                </option>
                @foreach ($question->surveyQuestionOptions as $option)
                <option value="{{ $option->value }}">
                  <i class="bi bi-dot me-2"></i>{{ $option->label }} - {{ $option->description }}
                </option>
                @endforeach
              </select>
            </div>
            @endforeach --}}

                            {{-- coba --}}
                            @foreach ($SurveyQuestion as $question)
                                <div class="mb-4">
                                    <label class="form-label fw-medium mb-2">
                                        {{ $question->content }}
                                    </label>

                                    <select name="answers[{{ $question->id_criteria }}]" class="form-select" required>
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
                                <button type="submit" class="btn btn-primary w-100 py-2">
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

            @if (isset($scores))
                <hr class="my-5">

                <h4 class="mb-3">Hasil Rekomendasi Kopi ☕</h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Nama Kopi</th>
                            <th>Nilai WP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item['coffee']->name }}</td>
                                <td>{{ number_format($item['score'], 6) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            {{-- coba --}}

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
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-sort-down me-2"></i>Urutkan
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item active" href="#"><i
                                            class="bi bi-check-lg me-2"></i>Relevansi</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-star me-2"></i>Rating
                                        Tertinggi</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-cash-coin me-2"></i>Harga
                                        Terendah</a></li>
                            </ul>
                        </div>

                        <div class="vr d-none d-md-block"></div>

                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="viewMode" id="gridView" autocomplete="off"
                                checked>
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

                <!-- Coffee Cards -->
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ([1, 2, 3, 4] as $index)
                        <div class="col">
                            <div class="card h-100">
                                <div class="position-relative overflow-hidden">
                                    <img src="https://picsum.photos/400/300?random={{ $index }}" class="card-img-top"
                                        alt="Kopi {{ $index }}" style="height: 220px; object-fit: cover;">
                                    <div class="position-absolute top-0 start-0">
                                        <span class="badge bg-danger bg-gradient m-3 px-3 py-2">
                                            <i class="bi bi-lightning-charge-fill me-1"></i>Hot Deal
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div>
                                            <h5 class="card-title fw-bold mb-1">
                                                <i class="bi bi-cup-hot text-warning me-2"></i>Kopi Premium
                                                {{ $index }}
                                            </h5>
                                            <div class="d-flex align-items-center">
                                                <div class="text-warning me-2">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= 4 + ($index % 2))
                                                            <i class="bi bi-star-fill"></i>
                                                        @else
                                                            <i class="bi bi-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <small class="text-muted">(4.{{ $index }})</small>
                                            </div>
                                        </div>
                                        <span
                                            class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2">
                                            {{ ['Arabica', 'Robusta', 'Liberika', 'Excelsa'][$index - 1] }}
                                        </span>
                                    </div>

                                    <p class="card-text text-secondary mb-4">
                                        @if ($index == 1)
                                            <i class="bi bi-flower1 text-success me-2"></i>Kopi dengan cita rasa khas dan
                                            aroma floral yang
                                            menenangkan.
                                        @elseif($index == 2)
                                            <i class="bi bi-lightning-charge text-warning me-2"></i>Kopi dengan karakter
                                            kuat dan kadar kafein
                                            tinggi.
                                        @elseif($index == 3)
                                            <i class="bi bi-heart text-danger me-2"></i>Perpaduan sempurna rasa manis dan
                                            asam seimbang.
                                        @else
                                            <i class="bi bi-gem text-primary me-2"></i>Kopi langka dengan kompleksitas rasa
                                            yang menakjubkan.
                                        @endif
                                    </p>

                                    <div class="bg-body-secondary bg-opacity-50 rounded-3 p-3 mb-3">
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-thermometer-half text-info me-2"></i>
                                                    <small class="text-body-secondary">Roast:
                                                        {{ ['Medium', 'Dark', 'Light', 'Medium-Dark'][$index - 1] }}</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-clock-history text-secondary me-2"></i>
                                                    <small class="text-body-secondary">{{ 15 + $index }} min</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-geo-alt text-success me-2"></i>
                                                    <small
                                                        class="text-body-secondary">{{ ['Sumatra', 'Java', 'Bali', 'Toraja'][$index - 1] }}</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-cup text-brown me-2"></i>
                                                    <small
                                                        class="text-body-secondary">{{ ['Sedang', 'Kuat', 'Ringan', 'Sedang'][$index - 1] }}
                                                        Body</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                        <div>
                                            <span class="h5 fw-bold text-primary mb-0">
                                                Rp {{ number_format(35000 + $index * 7000, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <button class="btn btn-primary px-4">
                                            <i class="bi bi-eye me-2"></i>Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--
      </div>

      <!-- Pagination & Info -->
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-5 pt-4 border-top">
        <div class="mb-3 mb-md-0">
          <p class="text-muted mb-1">
            <i class="bi bi-info-circle me-2"></i>Menampilkan 4 dari 12 rekomendasi
          </p>
        </div>

        <nav aria-label="Page navigation">
          <ul class="pagination mb-0">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <i class="bi bi-chevron-left"></i>
              </a>
            </li>
            <li class="page-item active">
              <span class="page-link bg-primary border-primary">1</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <i class="bi bi-chevron-right"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div> --}}
                </div>
            </div>
        </div>
    @endsection
