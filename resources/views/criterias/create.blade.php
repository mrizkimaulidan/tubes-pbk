<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Tambah Kriteria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kriteria.store') }}" method="POST" id="createForm">
          @csrf
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="code" id="code" placeholder="K1" required>
            <label for="code">Kode <span class="text-danger">*</span></label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kriteria" required>
            <label for="name">Nama Kriteria <span class="text-danger">*</span></label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" step="0.01" min="0" max="1" class="form-control" name="weight" id="weight"
              placeholder="0.25" required>
            <label for="weight">Bobot (0-1) <span class="text-danger">*</span></label>
          </div>

          <div class="mb-3">
            <label class="form-label">Tipe <span class="text-danger">*</span></label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="attribute" id="benefit" value="benefit" checked
                required>
              <label class="form-check-label" for="benefit">
                Benefit (Semakin tinggi semakin baik)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="attribute" id="cost" value="cost" required>
              <label class="form-check-label" for="cost">
                Cost (Semakin rendah semakin baik)
              </label>
            </div>
          </div>

          <div class="mb-3">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Opsional" name="description" id="description"
                style="height: 100px"></textarea>
              <label for="description">Deskripsi</label>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
