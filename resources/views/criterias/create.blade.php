<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light">
        <div>
          <h5 class="modal-title fw-semibold mb-1" id="createModalLabel">
            Tambah Kriteria Baru
          </h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('kriteria.store') }}" method="POST" id="createForm">
        @csrf

        <div class="modal-body">
          <div class="row g-3">
            <!-- Kode Kriteria -->
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="modalCode"
                  placeholder="K1" value="{{ old('code') }}" required>
                <label for="modalCode">
                  Kode <span class="text-danger">*</span>
                </label>
                @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- Nama Kriteria -->
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="modalName"
                  placeholder="Nama Kriteria" value="{{ old('name') }}" required>
                <label for="modalName">
                  Nama Kriteria <span class="text-danger">*</span>
                </label>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- Tipe Kriteria -->
            <div class="col-12">
              <div>
                <label class="form-label">Tipe <span class="text-danger">*</span></label>
                <div class="d-flex gap-3">
                  <div class="form-check">
                    <input class="form-check-input @error('attribute') is-invalid @enderror" type="radio"
                      name="attribute" id="benefit" value="benefit" {{ old('attribute', 'benefit' )=='benefit'
                      ? 'checked' : '' }} required>
                    <label class="form-check-label" for="benefit">
                      <span class="badge bg-primary-subtle text-primary-emphasis">Benefit</span>
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input @error('attribute') is-invalid @enderror" type="radio"
                      name="attribute" id="cost" value="cost" {{ old('attribute')=='cost' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="cost">
                      <span class="badge bg-secondary-subtle text-secondary-emphasis">Cost</span>
                    </label>
                  </div>
                </div>
                @error('attribute')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-text">
                  <small class="text-muted">
                    Benefit: semakin tinggi semakin baik | Cost: semakin rendah semakin baik
                  </small>
                </div>
              </div>
            </div>

            <!-- Deskripsi -->
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Opsional"
                  name="description" id="modalDescription" style="height: 100px">{{ old('description') }}</textarea>
                <label for="modalDescription">Deskripsi</label>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Deskripsi opsional untuk memberikan penjelasan tentang kriteria</div>
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
