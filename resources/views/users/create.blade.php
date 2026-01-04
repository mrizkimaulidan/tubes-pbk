<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Tambah Pengguna</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pengguna.store') }}" method="POST" id="createForm">
          @csrf
          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
              placeholder="Nama Lengkap" value="{{ old('name') }}" required>
            <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
              placeholder="Alamat Email" value="{{ old('email') }}" required>
            <label for="email">Alamat Email <span class="text-danger">*</span></label>
          </div>

          <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
              id="password" placeholder="Kata Sandi" required>
            <label for="password">Kata Sandi <span class="text-danger">*</span></label>
          </div>

          <div class="form-floating mb-3">
            <input type="password_confirmation" class="form-control" name="password_confirmation"
              id="password_confirmation" placeholder="Konfirmasi Kata Sandi" required>
            <label for="password_confirmation">Konfirmasi Kata Sandi <span class="text-danger">*</span></label>
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
