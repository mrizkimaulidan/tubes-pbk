@extends('layouts.app')

@section('title', 'Ubah Data Coffee')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Ubah Data Kopi</h5>
            <a href="{{ route('kopi.index') }}" class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
          </div>

          <form action="{{ route('kopi.update', $coffee) }}" method="POST" id="editForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                                id="name" placeholder="Nama Kopi" value="{{ old('name', $coffee->name) }}" required>
                              <label for="name">Nama Kopi <span class="text-danger">*</span></label>
                              @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-floating">
                              <input type="number" step="1000" min="0"
                                class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                                placeholder="Masukkan harga" value="{{ old('price', $coffee->price) }}" required>
                              <label for="price">Harga (Rp) <span class="text-danger">*</span></label>
                              @error('price')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                              <div class="form-text">Contoh: 25000</div>
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="form-floating">
                              <textarea class="form-control @error('description') is-invalid @enderror"
                                placeholder="Opsional" name="description" id="description"
                                style="height: 120px">{{ old('description', $coffee->description) }}</textarea>
                              <label for="description">Deskripsi</label>
                              @error('description')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-6">
                            <label for="beans_type" class="form-label">Jenis Biji Kopi <span
                                class="text-danger">*</span></label>
                            <select name="beans_type" id="beans_type"
                              class="form-select @error('beans_type') is-invalid @enderror" required>
                              <option value="" disabled>Pilih Jenis Biji Kopi</option>
                              <option value="Arabica" @selected(old('beans_type', $coffee->beans_type) ==
                                'Arabica')>Arabica</option>
                              <option value="Robusta" @selected(old('beans_type', $coffee->beans_type) ==
                                'Robusta')>Robusta</option>
                              <option value="Liberica" @selected(old('beans_type', $coffee->beans_type) ==
                                'Liberica')>Liberica</option>
                              <option value="Blend" @selected(old('beans_type', $coffee->beans_type) == 'Blend')>Blend
                              </option>
                            </select>
                            @error('beans_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="col-md-6">
                            <label for="image_url" class="form-label">Unggah Gambar Baru</label>
                            <input class="form-control @error('image_url') is-invalid @enderror" type="file"
                              name="image_url" id="image_url" accept="image/*">
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
                              <select name="taste" id="taste" class="form-select @error('taste') is-invalid @enderror"
                                required>
                                <option value="" disabled>Pilih Rasa</option>
                                <option value="Sangat Manis" @selected(old('taste', $coffee->taste) == 'Sangat
                                  Manis')>Sangat Manis</option>
                                <option value="Manis" @selected(old('taste', $coffee->taste) == 'Manis')>Manis</option>
                                <option value="Seimbang" @selected(old('taste', $coffee->taste) == 'Seimbang')>Seimbang
                                </option>
                                <option value="Pahit" @selected(old('taste', $coffee->taste) == 'Pahit')>Pahit</option>
                                <option value="Sangat Pahit" @selected(old('taste', $coffee->taste) == 'Sangat
                                  Pahit')>Sangat Pahit</option>
                              </select>
                              <label for="taste">Rasa Dominan <span class="text-danger">*</span></label>
                              @error('taste')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-floating">
                              <select name="intensity" id="intensity"
                                class="form-select @error('intensity') is-invalid @enderror" required>
                                <option value="" disabled>Pilih Intensitas</option>
                                <option value="Sangat Ringan" @selected(old('intensity', $coffee->intensity) == 'Sangat
                                  Ringan')>Sangat Ringan</option>
                                <option value="Ringan" @selected(old('intensity', $coffee->intensity) ==
                                  'Ringan')>Ringan</option>
                                <option value="Sedang" @selected(old('intensity', $coffee->intensity) ==
                                  'Sedang')>Sedang</option>
                                <option value="Kuat" @selected(old('intensity', $coffee->intensity) == 'Kuat')>Kuat
                                </option>
                                <option value="Sangat Kuat" @selected(old('intensity', $coffee->intensity) == 'Sangat
                                  Kuat')>Sangat Kuat</option>
                              </select>
                              <label for="intensity">Intensitas Rasa <span class="text-danger">*</span></label>
                              @error('intensity')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-floating">
                              <select name="sweetness" id="sweetness"
                                class="form-select @error('sweetness') is-invalid @enderror" required>
                                <option value="" disabled>Pilih Tingkat Kemanisan</option>
                                <option value="Tanpa Gula" @selected(old('sweetness', $coffee->sweetness) == 'Tanpa
                                  Gula')>Tanpa Gula</option>
                                <option value="Sedikit Manis" @selected(old('sweetness', $coffee->sweetness) == 'Sedikit
                                  Manis')>Sedikit Manis</option>
                                <option value="Sedang" @selected(old('sweetness', $coffee->sweetness) ==
                                  'Sedang')>Sedang</option>
                                <option value="Manis" @selected(old('sweetness', $coffee->sweetness) == 'Manis')>Manis
                                </option>
                                <option value="Sangat Manis" @selected(old('sweetness', $coffee->sweetness) == 'Sangat
                                  Manis')>Sangat Manis</option>
                              </select>
                              <label for="sweetness">Tingkat Kemanisan <span class="text-danger">*</span></label>
                              @error('sweetness')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-floating">
                              <select name="milk_level" id="milk_level"
                                class="form-select @error('milk_level') is-invalid @enderror" required>
                                <option value="" disabled>Pilih Level Susu</option>
                                <option value="Tanpa Susu" @selected(old('milk_level', $coffee->milk_level) == 'Tanpa
                                  Susu')>Tanpa Susu</option>
                                <option value="Sedikit" @selected(old('milk_level', $coffee->milk_level) ==
                                  'Sedikit')>Sedikit</option>
                                <option value="Sedang" @selected(old('milk_level', $coffee->milk_level) ==
                                  'Sedang')>Sedang</option>
                                <option value="Banyak" @selected(old('milk_level', $coffee->milk_level) ==
                                  'Banyak')>Banyak</option>
                                <option value="Sangat Banyak" @selected(old('milk_level', $coffee->milk_level) ==
                                  'Sangat Banyak')>Sangat Banyak</option>
                              </select>
                              <label for="milk_level">Level Susu <span class="text-danger">*</span></label>
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

              <!-- Kolom Kanan - Gambar & Preview -->
              <div class="col-lg-4">
                <div class="card border-0 bg-light-subtle">
                  <div class="card-body">
                    <h6 class="mb-3 pb-2 border-bottom">
                      <i class="bi bi-image me-2"></i>Gambar Kopi
                    </h6>

                    <!-- Gambar Saat Ini -->
                    <div class="mb-4">
                      <h6 class="small text-muted mb-2">Gambar Saat Ini</h6>
                      @if($coffee->image_url)
                      <div class="text-center">
                        <img src="{{ asset('storage/' . $coffee->image_url) }}" class="img-thumbnail mb-2"
                          alt="Current Image" style="width: 100%; height: 250px; object-fit: cover;">
                        <p class="small text-muted mb-0">Gambar yang sedang digunakan</p>
                      </div>
                      @else
                      <div class="alert alert-warning py-3 text-center">
                        <i class="bi bi-image me-2"></i>Tidak ada gambar
                      </div>
                      @endif
                    </div>

                    <!-- Preview Gambar Baru -->
                    <div>
                      <h6 class="small text-muted mb-2">Pratinjau Gambar Baru</h6>
                      <div class="text-center">
                        <img src="#" class="img-thumbnail mb-2" alt="Preview" id="image_preview"
                          style="width: 100%; height: 250px; object-fit: cover; display: none;">
                        <p class="small text-muted mb-0" id="preview-text">
                          <i class="bi bi-info-circle me-1"></i>
                          Pratinjau akan muncul di sini setelah memilih gambar
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
              <a href="{{ route('kopi.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle me-1"></i> Batal
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@push('javascript')
<script>
  document.getElementById('image_url').addEventListener('change', function(e) {
    const preview = document.getElementById('image_preview');
    const previewText = document.getElementById('preview-text');
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

@endsection
