<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Tambah Data Kopi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kopi.store') }}" method="POST" id="createForm" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <!-- Kolom Kiri - Informasi Dasar -->
            <div class="col-md-6">
              <h6 class="mb-3 pb-2">
                Informasi Dasar Kopi
              </h6>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kopi" required>
                <label for="name">Nama Kopi <span class="text-danger">*</span></label>
              </div>

              <div class="form-floating mb-3">
                <input type="number" step="1000" min="0" class="form-control" name="price" id="price"
                  placeholder="Masukkan harga" required>
                <label for="price">Harga (Rp) <span class="text-danger">*</span></label>
              </div>

              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Opsional" name="description" id="description"
                  style="height: 120px"></textarea>
                <label for="description">Deskripsi</label>
              </div>

              <div class="mb-3">
                <label for="image_url" class="form-label">Pilih gambar</label>
                <input class="form-control" type="file" name="image_url" id="image_url">
              </div>
            </div>

            <!-- Kolom Kanan - Karakteristik Kopi -->
            <div class="col-md-6">
              <h6 class="mb-3 pb-2">
                <i class="fas fa-sliders-h me-2"></i>Karakteristik Kopi
              </h6>

              <div class="row g-3">
                <div class="col-12">
                  <div class="form-floating">
                    <select name="taste" id="taste" class="form-select" required>
                      <option value="" disabled selected>Pilih Rasa</option>
                      <option value="Sangat Manis">Sangat Manis</option>
                      <option value="Manis">Manis</option>
                      <option value="Seimbang">Seimbang</option>
                      <option value="Pahit">Pahit</option>
                      <option value="Sangat Pahit">Sangat Pahit</option>
                    </select>
                    <label for="taste">Rasa Dominan <span class="text-danger">*</span></label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <select name="intensity" id="intensity" class="form-select" required>
                      <option value="" disabled selected>Pilih Intensitas</option>
                      <option value="Sangat Ringan">Sangat Ringan</option>
                      <option value="Ringan">Ringan</option>
                      <option value="Sedang">Sedang</option>
                      <option value="Kuat">Kuat</option>
                      <option value="Sangat Kuat">Sangat Kuat</option>
                    </select>
                    <label for="intensity">Intensitas Rasa <span class="text-danger">*</span></label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <select name="sweetness" id="sweetness" class="form-select" required>
                      <option value="" disabled selected>Pilih Tingkat Kemanisan</option>
                      <option value="Tanpa Gula">Tanpa Gula</option>
                      <option value="Sedikit Manis">Sedikit Manis</option>
                      <option value="Sedang">Sedang</option>
                      <option value="Manis">Manis</option>
                      <option value="Sangat Manis">Sangat Manis</option>
                    </select>
                    <label for="sweetness">Tingkat Kemanisan <span class="text-danger">*</span></label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <select name="milk_level" id="milk_level" class="form-select" required>
                      <option value="" disabled selected>Pilih Level Susu</option>
                      <option value="Tanpa Susu">Tanpa Susu</option>
                      <option value="Sedikit">Sedikit</option>
                      <option value="Sedang">Sedang</option>
                      <option value="Banyak">Banyak</option>
                      <option value="Sangat Banyak">Sangat Banyak</option>
                    </select>
                    <label for="milk_level">Level Susu <span class="text-danger">*</span></label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <select name="beans_type" id="beans_type" class="form-select" required>
                      <option value="" disabled selected>Pilih Jenis Biji Kopi</option>
                      <option value="Arabica">Arabica</option>
                      <option value="Robusta">Robusta</option>
                      <option value="Liberica">Liberica</option>
                      <option value="Blend">Blend</option>
                    </select>
                    <label for="beans_type">Jenis Biji Kopi <span class="text-danger">*</span></label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Tutup
            </button>
            <button type="submit" class="btn btn-primary">
              Tambah
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
