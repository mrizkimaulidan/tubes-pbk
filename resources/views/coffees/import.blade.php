<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="importModalLabel">Impor Data Kopi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kopi.import') }}" method="POST" id="createForm" enctype="multipart/form-data">

          @csrf
          <div class="mb-3">
            <label for="file" class="form-label">Pilih file</label>
            <input class="form-control" type="file" name="file" id="file">
            <small class="text-muted">Format file yang didukung: (.xlsx)</small>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Impor</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
