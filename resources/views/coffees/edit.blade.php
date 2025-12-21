@extends('layouts.app')

@section('title', 'Ubah Data Coffee')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ubah Data Kopi</h5>

          <form action="{{ route('kopi.update', $coffee) }}" method="POST" id="editForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
              <!-- Kolom Kiri - Informasi Dasar -->
              <div class="col-md-6">
                <h6 class="mb-3 pb-2">
                  Informasi Dasar Kopi
                </h6>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kopi"
                    value="{{ $coffee->name }}" required>
                  <label for="name">Nama Kopi <span class="text-danger">*</span></label>
                </div>

                <div class="form-floating mb-3">
                  <input type="number" step="1000" min="0" class="form-control" name="price" id="price"
                    placeholder="Masukkan harga" value="{{ $coffee->price }}" required>
                  <label for="price">Harga (Rp) <span class="text-danger">*</span></label>
                </div>

                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Opsional" name="description" id="description"
                    style="height: 120px">{{ $coffee->description }}</textarea>
                  <label for="description">Deskripsi</label>
                </div>

                <div class="mb-3">
                  <label for="image_url" class="form-label">Pilih Gambar</label>
                  <input class="form-control" type="file" name="image_url" id="image_url" accept="image/*">
                </div>

                <div class="mb-3">
                  @if($coffee->image_url)
                  <img src="{{ asset('storage/' . $coffee->image_url) }}" class="img-thumbnail" alt="Current Image"
                    style="width: 300px; height: 300px; object-fit: cover;">
                  @else
                  <div class="alert alert-info">Tidak ada gambar</div>
                  @endif
                </div>

                <div class="mb-3">
                  <img src="#" class="img-thumbnail" alt="Preview" id="image_preview"
                    style="width: 300px; height: 300px; object-fit: cover; display: none;">
                </div>
              </div>

              <!-- Kolom Kanan - Karakteristik Kopi -->
              <div class="col-md-6">
                <h6 class="mb-3 pb-2">
                  Karakteristik Kopi
                </h6>

                <div class="row g-3">
                  <div class="col-12">
                    <div class="form-floating">
                      <select name="taste" id="taste" class="form-select" required>
                        <option value="" disabled>Pilih Rasa</option>
                        <option value="Sangat Manis" @selected($coffee->taste == 'Sangat Manis')>Sangat
                          Manis</option>
                        <option value="Manis" @selected($coffee->taste == 'Manis')>Manis</option>
                        <option value="Seimbang" @selected($coffee->taste == 'Seimbang')>Seimbang</option>
                        <option value="Pahit" @selected($coffee->taste == 'Pahit')>Pahit</option>
                        <option value="Sangat Pahit" @selected($coffee->taste == 'Sangat Pahit')>Sangat Pahit</option>
                      </select>
                      <label for="taste">Rasa Dominan <span class="text-danger">*</span></label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-floating">
                      <select name="intensity" id="intensity" class="form-select" required>
                        <option value="" disabled>Pilih Intensitas</option>
                        <option value="Sangat Ringan" @selected($coffee->intensity == 'Sangat Ringan')>Sangat Ringan
                        </option>
                        <option value="Ringan" @selected($coffee->intensity == 'Ringan')>Ringan</option>
                        <option value="Sedang" @selected($coffee->intensity == 'Sedang')>Sedang</option>
                        <option value="Kuat" @selected($coffee->intensity == 'Kuat')>Kuat</option>
                        <option value="Sangat Kuat" @selected($coffee->intensity == 'Sangat Kuat')>Sangat Kuat</option>
                      </select>
                      <label for="intensity">Intensitas Rasa <span class="text-danger">*</span></label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-floating">
                      <select name="sweetness" id="sweetness" class="form-select" required>
                        <option value="" disabled>Pilih Tingkat Kemanisan</option>
                        <option value="Tanpa Gula" @selected($coffee->sweetness == 'Tanpa Gula')>Tanpa Gula
                        </option>
                        <option value="Sedikit Manis" @selected($coffee->sweetness == 'Sedikit Manis')>Sedikit Manis
                        </option>
                        <option value="Sedang" @selected($coffee->sweetness == 'Sedang')>Sedang</option>
                        <option value="Manis" @selected($coffee->sweetness == 'Manis')>Manis</option>
                        <option value="Sangat Manis" @selected($coffee->sweetness == 'Sangat Manis')>Sangat
                          Manis</option>
                      </select>
                      <label for="sweetness">Tingkat Kemanisan <span class="text-danger">*</span></label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-floating">
                      <select name="milk_level" id="milk_level" class="form-select" required>
                        <option value="" disabled>Pilih Level Susu</option>
                        <option value="Tanpa Susu" @selected($coffee->milk_level == 'Tanpa Susu')>Tanpa
                          Susu</option>
                        <option value="Sedikit" @selected($coffee->milk_level == 'Sedikit')>Sedikit
                        </option>
                        <option value="Sedang" @selected($coffee->milk_level == 'Sedang')>Sedang</option>
                        <option value="Banyak" @selected($coffee->milk_level == 'Banyak')>Banyak</option>
                        <option value="Sangat Banyak" @selected($coffee->milk_level == 'Sangat Banyak')>Sangat Banyak
                        </option>
                      </select>
                      <label for="milk_level">Level Susu <span class="text-danger">*</span></label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-floating">
                      <select name="beans_type" id="beans_type" class="form-select" required>
                        <option value="" disabled>Pilih Jenis Biji Kopi</option>
                        <option value="Arabica" @selected($coffee->beans_type == 'Arabica')>Arabica
                        </option>
                        <option value="Robusta" @selected($coffee->beans_type == 'Robusta')>Robusta
                        </option>
                        <option value="Liberica" @selected($coffee->beans_type == 'Liberica')>Liberica
                        </option>
                        <option value="Blend" @selected($coffee->beans_type == 'Blend')>Blend</option>
                      </select>
                      <label for="beans_type">Jenis Biji Kopi <span class="text-danger">*</span></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
              <a href="{{ route('kopi.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
              </a>
              <div>
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-check-circle"></i> Simpan
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
