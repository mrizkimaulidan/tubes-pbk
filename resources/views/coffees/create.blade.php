<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Tambah Data Kopi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kopi.store') }}" method="POST" id="createForm">

                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kopi"
                            required>
                        <label for="name">Nama Kopi <span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" step="1" min="0" class="form-control" name="price"
                            id="price" placeholder="Masukkan price" required>
                        <label for="price">Harga<span class="text-danger">*</span></label>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Opsional" name="description" id="description" style="height: 100px"></textarea>
                            <label for="description">Deskripsi</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="url" class="form-control" name="image_url" id="image_url"
                            placeholder="https://example.com/gambar.jpg" required>
                        <label for="image_url">Image URL <span class="text-danger">*</span></label>
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
