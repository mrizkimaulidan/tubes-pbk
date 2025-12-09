<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Tambah Pertanyaan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pertanyaan.store') }}" method="POST" id="createForm">
          @csrf
          <div class="mb-3">
            <div class="form-floating">
              <select class="form-select" name="criteria_id" id="criteria_id">
                <option selected>Pilih Kriteria</option>
                @foreach ($criterias as $criteria)
                <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                @endforeach
              </select>
              <label for="criteria_id">Pilih Kriteria <span class="text-danger">*</span></label>
            </div>
          </div>

          <div class="mb-3">
            <div class="form-floating">
              <textarea class="form-control" name="content" id="content" style="height: 100px"></textarea>
              <label for="content">Pertanyaan <span class="text-danger">*</span></label>
            </div>
          </div>

          <div class="mb-3">
            <div class="form-floating">
              <select class="form-select" name="locale" id="locale">
                <option selected>Pilih Bahasa</option>
                <option value="id">Indonesia</option>
                <option value="en">Inggris</option>
              </select>
              <label for="locale">Pilih Bahasa <span class="text-danger">*</span></label>
            </div>
          </div>

          <div class="form-floating mb-3">
            <input type="number" class="form-control" name="sort_order" id="sort_order" placeholder="Urutan Display"
              required>
            <label for="sort_order">Urutan Display <span class="text-danger">*</span></label>
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
