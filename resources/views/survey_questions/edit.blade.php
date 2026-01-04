@extends('layouts.app')

@section('title', 'Ubah Pertanyaan')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Ubah Pertanyaan</h5>
            <a href="{{ route('pertanyaan.index') }}" class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
          </div>

          @include('partials.alert')

          <div class="row g-4">
            <!-- Kolom Kiri - Form Edit -->
            <div class="col-lg-6">
              <div class="card border-0 bg-light-subtle h-100">
                <div class="card-body">
                  <h6 class="mb-3 pb-2 border-bottom">
                    <i class="bi bi-pencil-square me-2"></i>Edit Pertanyaan
                  </h6>

                  <form action="{{ route('pertanyaan.update', $question) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                      <div class="col-12">
                        <div class="form-floating">
                          <input type="text" value="{{ $question->criteria->code }} - {{ $question->criteria->name }}"
                            class="form-control" disabled>
                          <label>Kriteria Terkait</label>
                          <div class="form-text">
                            Kriteria tidak dapat diubah setelah dibuat
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-floating">
                          <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                            id="content" placeholder="Masukkan pertanyaan" style="height: 120px"
                            required>{{ old('content', $question->content) }}</textarea>
                          <label for="content">Pertanyaan <span class="text-danger">*</span></label>
                          @error('content')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating">
                          <select class="form-select @error('locale') is-invalid @enderror" name="locale" id="locale"
                            required>
                            <option value="" disabled>Pilih Bahasa</option>
                            <option value="id" @selected(old('locale', $question->locale) == 'id')>Indonesia</option>
                            <option value="en" @selected(old('locale', $question->locale) == 'en')>Inggris</option>
                          </select>
                          <label for="locale">Bahasa <span class="text-danger">*</span></label>
                          @error('locale')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="number" value="{{ old('sort_order', $question->sort_order) }}"
                            class="form-control @error('sort_order') is-invalid @enderror" name="sort_order"
                            id="sort_order" placeholder="1" min="1" required>
                          <label for="sort_order">Urutan <span class="text-danger">*</span></label>
                          @error('sort_order')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                          <div class="form-text">Angka kecil ditampilkan lebih dulu</div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
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

            <!-- Kolom Kanan - Daftar Opsi Jawaban -->
            <div class="col-lg-6">
              <div class="card border-0 bg-light-subtle h-100">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">
                      <i class="bi bi-list-check me-2"></i>Daftar Opsi Jawaban
                    </h6>
                    <span class="badge bg-info-subtle text-info-emphasis">
                      {{ $question->surveyQuestionOptions->count() }} opsi
                    </span>
                  </div>

                  @if($question->surveyQuestionOptions->count() > 0)
                  <div class="list-group">
                    @foreach ($question->surveyQuestionOptions as $option)
                    <div class="list-group-item">
                      <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                          <div class="fw-semibold">{{ $option->label }}</div>
                          @if($option->description)
                          <div class="small text-muted mt-1">{{ $option->description }}</div>
                          @endif
                        </div>
                        <div class="ms-3 text-end">
                          <span class="badge bg-success-subtle text-success-emphasis">
                            Nilai: {{ $option->value }}
                          </span>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @else
                  <div class="text-center py-4">
                    <div class="mb-3">
                      <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                    </div>
                    <p class="text-muted">Belum ada opsi jawaban</p>
                  </div>
                  @endif

                  <div class="mt-4 pt-3 border-top">
                    <small class="text-muted">
                      <i class="bi bi-info-circle me-1"></i>
                      Opsi jawaban dapat dikelola melalui menu pengelolaan opsi
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
