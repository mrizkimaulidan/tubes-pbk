<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light">
        <div>
          <h5 class="modal-title fw-semibold mb-1" id="importModalLabel">
            Impor Data Kopi
          </h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('kopi.import') }}" method="POST" id="importForm" enctype="multipart/form-data">
        @csrf

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-12">
              <div class="mb-3">
                <label for="file" class="form-label">Pilih File <span class="text-danger">*</span></label>
                <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="file"
                  accept=".xlsx" required>
                @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Format file yang didukung: .xlsx (Maksimal 5MB)</div>
              </div>
            </div>

            <div class="col-12">
              <div class="alert alert-info">
                <div class="d-flex">
                  <div class="me-3">
                    <i class="bi bi-info-circle"></i>
                  </div>
                  <div>
                    <p class="mb-1 fw-semibold">Pastikan file Excel berisi kolom:</p>
                    <ul class="mb-0 ps-3 small">
                      <li><code>name</code> - Nama kopi</li>
                      <li><code>price</code> - Harga</li>
                      <li><code>description</code> - Deskripsi</li>
                      <li><code>beans_type</code> - Jenis biji</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer border-top pt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Batal
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-upload me-1"></i> Impor
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
