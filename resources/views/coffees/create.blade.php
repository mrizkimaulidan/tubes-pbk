<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light">
        <div>
          <h5 class="modal-title fw-semibold mb-1" id="createModalLabel">
            Tambah Data Kopi Baru
          </h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('kopi.store') }}" method="POST" id="createForm" enctype="multipart/form-data">
        @csrf

        <div class="modal-body">
          <div class="row g-4">
            <!-- Kolom Kiri - Informasi Dasar & Karakteristik -->
            <div class="col-lg-8">
              <div class="row g-4">
                <!-- Informasi Dasar Kopi -->
                <div class="col-12">
                  <div class="card border-0 bg-light-subtle">
                    <div class="card-body">
                      <h6 class="mb-3 pb-2 border-bottom">
                        <i class="bi bi-info-circle me-2"></i>Informasi Dasar Kopi
                      </h6>

                      <div class="row g-3">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                              id="modalName" placeholder="Nama Kopi" value="{{ old('name') }}" required>
                            <label for="modalName">Nama Kopi <span class="text-danger">*</span></label>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-floating">
                            <input type="number" step="1000" min="0"
                              class="form-control @error('price') is-invalid @enderror" name="price" id="modalPrice"
                              placeholder="Masukkan harga" value="{{ old('price') }}" required>
                            <label for="modalPrice">Harga (Rp) <span class="text-danger">*</span></label>
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Contoh: 25000</div>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-floating">
                            <textarea class="form-control @error('description') is-invalid @enderror"
                              placeholder="Opsional" name="description" id="modalDescription"
                              style="height: 120px">{{ old('description') }}</textarea>
                            <label for="modalDescription">Deskripsi</label>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <label for="modalBeansType" class="form-label">Jenis Biji Kopi <span
                              class="text-danger">*</span></label>
                          <select name="beans_type" id="modalBeansType"
                            class="form-select @error('beans_type') is-invalid @enderror" required>
                            <option value="" disabled>Pilih Jenis Biji Kopi</option>
                            <option value="Arabica" {{ old('beans_type')=='Arabica' ? 'selected' : '' }}>Arabica
                            </option>
                            <option value="Robusta" {{ old('beans_type')=='Robusta' ? 'selected' : '' }}>Robusta
                            </option>
                            <option value="Liberica" {{ old('beans_type')=='Liberica' ? 'selected' : '' }}>Liberica
                            </option>
                            <option value="Blend" {{ old('beans_type')=='Blend' ? 'selected' : '' }}>Blend</option>
                          </select>
                          @error('beans_type')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="col-md-6">
                          <label for="modalImageUrl" class="form-label">Unggah Gambar</label>
                          <input class="form-control @error('image_url') is-invalid @enderror" type="file"
                            name="image_url" id="modalImageUrl" accept="image/*">
                          @error('image_url')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                          <div class="form-text">Ukuran maksimal: 2MB. Format: JPG, PNG, JPEG</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Karakteristik Kopi -->
                <div class="col-12">
                  <div class="card border-0 bg-light-subtle">
                    <div class="card-body">
                      <h6 class="mb-3 pb-2 border-bottom">
                        <i class="bi bi-cup-hot me-2"></i>Karakteristik Kopi
                      </h6>

                      <div class="row g-3">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <select name="taste" id="modalTaste"
                              class="form-select @error('taste') is-invalid @enderror" required>
                              <option value="" disabled>Pilih Rasa</option>
                              <option value="Sangat Manis" {{ old('taste')=='Sangat Manis' ? 'selected' : '' }}>Sangat
                                Manis</option>
                              <option value="Manis" {{ old('taste')=='Manis' ? 'selected' : '' }}>Manis</option>
                              <option value="Seimbang" {{ old('taste')=='Seimbang' ? 'selected' : '' }}>Seimbang
                              </option>
                              <option value="Pahit" {{ old('taste')=='Pahit' ? 'selected' : '' }}>Pahit</option>
                              <option value="Sangat Pahit" {{ old('taste')=='Sangat Pahit' ? 'selected' : '' }}>Sangat
                                Pahit</option>
                            </select>
                            <label for="modalTaste">Rasa Dominan <span class="text-danger">*</span></label>
                            @error('taste')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-floating">
                            <select name="intensity" id="modalIntensity"
                              class="form-select @error('intensity') is-invalid @enderror" required>
                              <option value="" disabled>Pilih Intensitas</option>
                              <option value="Sangat Ringan" {{ old('intensity')=='Sangat Ringan' ? 'selected' : '' }}>
                                Sangat Ringan</option>
                              <option value="Ringan" {{ old('intensity')=='Ringan' ? 'selected' : '' }}>Ringan</option>
                              <option value="Sedang" {{ old('intensity')=='Sedang' ? 'selected' : '' }}>Sedang</option>
                              <option value="Kuat" {{ old('intensity')=='Kuat' ? 'selected' : '' }}>Kuat</option>
                              <option value="Sangat Kuat" {{ old('intensity')=='Sangat Kuat' ? 'selected' : '' }}>Sangat
                                Kuat</option>
                            </select>
                            <label for="modalIntensity">Intensitas Rasa <span class="text-danger">*</span></label>
                            @error('intensity')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-floating">
                            <select name="sweetness" id="modalSweetness"
                              class="form-select @error('sweetness') is-invalid @enderror" required>
                              <option value="" disabled>Pilih Tingkat Kemanisan</option>
                              <option value="Tanpa Gula" {{ old('sweetness')=='Tanpa Gula' ? 'selected' : '' }}>Tanpa
                                Gula</option>
                              <option value="Sedikit Manis" {{ old('sweetness')=='Sedikit Manis' ? 'selected' : '' }}>
                                Sedikit Manis</option>
                              <option value="Sedang" {{ old('sweetness')=='Sedang' ? 'selected' : '' }}>Sedang</option>
                              <option value="Manis" {{ old('sweetness')=='Manis' ? 'selected' : '' }}>Manis</option>
                              <option value="Sangat Manis" {{ old('sweetness')=='Sangat Manis' ? 'selected' : '' }}>
                                Sangat Manis</option>
                            </select>
                            <label for="modalSweetness">Tingkat Kemanisan <span class="text-danger">*</span></label>
                            @error('sweetness')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-floating">
                            <select name="milk_level" id="modalMilkLevel"
                              class="form-select @error('milk_level') is-invalid @enderror" required>
                              <option value="" disabled>Pilih Level Susu</option>
                              <option value="Tanpa Susu" {{ old('milk_level')=='Tanpa Susu' ? 'selected' : '' }}>Tanpa
                                Susu</option>
                              <option value="Sedikit" {{ old('milk_level')=='Sedikit' ? 'selected' : '' }}>Sedikit
                              </option>
                              <option value="Sedang" {{ old('milk_level')=='Sedang' ? 'selected' : '' }}>Sedang</option>
                              <option value="Banyak" {{ old('milk_level')=='Banyak' ? 'selected' : '' }}>Banyak</option>
                              <option value="Sangat Banyak" {{ old('milk_level')=='Sangat Banyak' ? 'selected' : '' }}>
                                Sangat Banyak</option>
                            </select>
                            <label for="modalMilkLevel">Level Susu <span class="text-danger">*</span></label>
                            @error('milk_level')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Kolom Kanan - Preview Gambar -->
            <div class="col-lg-4">
              <div class="card border-0 bg-light-subtle h-100">
                <div class="card-body">
                  <h6 class="mb-3 pb-2 border-bottom">
                    <i class="bi bi-image me-2"></i>Preview Gambar
                  </h6>

                  <div class="text-center">
                    <img src="#" class="img-thumbnail mb-3" alt="Preview" id="modalImagePreview"
                      style="width: 100%; height: 250px; object-fit: cover; display: none;">
                    <p class="small text-muted mb-0" id="modalPreviewText">
                      <i class="bi bi-info-circle me-1"></i>
                      Pratinjau akan muncul di sini setelah memilih gambar
                    </p>
                  </div>

                  <div class="mt-4 pt-3 border-top">
                    <small class="text-muted">
                      <i class="bi bi-lightbulb me-1"></i>
                      Tips: Gunakan gambar dengan rasio 1:1 untuk hasil terbaik
                    </small>
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
            <i class="bi bi-check-circle me-1"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('javascript')
<script>
  document.getElementById('modalImageUrl').addEventListener('change', function(e) {
    const preview = document.getElementById('modalImagePreview');
    const previewText = document.getElementById('modalPreviewText');
    const file = e.target.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        previewText.style.display = 'none';
      }
      reader.readAsDataURL(file);
    } else {
      preview.style.display = 'none';
      previewText.style.display = 'block';
    }
  });
</script>
@endpush
