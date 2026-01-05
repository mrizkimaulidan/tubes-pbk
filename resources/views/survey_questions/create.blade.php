<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light">
        <div>
          <h5 class="modal-title fw-semibold mb-1" id="createModalLabel">
            Tambah Pertanyaan Baru
          </h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('pertanyaan.store') }}" method="POST" id="createForm">
        @csrf

        <div class="modal-body">
          <div class="row g-3">
            <!-- Kriteria -->
            <div class="col-12">
              <div class="form-floating">
                <select class="form-select @error('criteria_id') is-invalid @enderror" name="criteria_id"
                  id="criteria_id" required>
                  <option value="" disabled selected>Pilih Kriteria</option>
                  @foreach ($criterias as $criteria)
                  <option value="{{ $criteria->id }}" {{ old('criteria_id')==$criteria->id ? 'selected' : '' }}>
                    {{ $criteria->code }} - {{ $criteria->name }}
                  </option>
                  @endforeach
                </select>
                <label for="criteria_id">Kriteria <span class="text-danger">*</span></label>
                @error('criteria_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Pilih kriteria yang terkait dengan pertanyaan ini</div>
              </div>
            </div>

            <!-- Pertanyaan -->
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="modalContent"
                  placeholder="Masukkan pertanyaan" style="height: 120px" required>{{ old('content') }}</textarea>
                <label for="modalContent">Pertanyaan <span class="text-danger">*</span></label>
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Masukkan pertanyaan untuk survey</div>
              </div>
            </div>

            <!-- Bahasa -->
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-select @error('locale') is-invalid @enderror" name="locale" id="modalLocale"
                  required>
                  <option value="" disabled>Pilih Bahasa</option>
                  <option value="id" {{ old('locale', 'id' )=='id' ? 'selected' : '' }}>Indonesia</option>
                  <option value="en" {{ old('locale')=='en' ? 'selected' : '' }}>Inggris</option>
                </select>
                <label for="modalLocale">Bahasa <span class="text-danger">*</span></label>
                @error('locale')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- Urutan -->
            <div class="col-md-6">
              <div class="form-floating">
                <input type="number" value="{{ old('sort_order', 1) }}"
                  class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" id="modalSortOrder"
                  placeholder="1" min="1" required>
                <label for="modalSortOrder">Urutan <span class="text-danger">*</span></label>
                @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Angka kecil ditampilkan lebih dulu</div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer border-top pt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Batal
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle me-1"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
