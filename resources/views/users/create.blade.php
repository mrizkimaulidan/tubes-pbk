<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light">
        <div>
          <h5 class="modal-title fw-semibold mb-1" id="createModalLabel">
            Tambah Pengguna Baru
          </h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('pengguna.store') }}" method="POST" id="createForm">
        @csrf

        <div class="modal-body">
          <div class="row g-3">
            <!-- Informasi Dasar -->
            <div class="col-12">
              <div class="card border-0 bg-light-subtle">
                <div class="card-body">
                  <h6 class="mb-3 pb-2 border-bottom">
                    <i class="bi bi-person-circle me-2"></i>Informasi Dasar
                  </h6>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                          id="modalName" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                        <label for="modalName">Nama Lengkap <span class="text-danger">*</span></label>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                          id="modalEmail" placeholder="Alamat Email" value="{{ old('email') }}" required>
                        <label for="modalEmail">Alamat Email <span class="text-danger">*</span></label>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Kata Sandi (Wajib) -->
            <div class="col-12">
              <div class="card border-0 bg-light-subtle">
                <div class="card-body">
                  <h6 class="mb-3 pb-2 border-bottom">
                    <i class="bi bi-shield-lock me-2"></i>Kata Sandi
                  </h6>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                          name="password" id="modalPassword" placeholder="Kata Sandi" required>
                        <label for="modalPassword">Kata Sandi <span class="text-danger">*</span></label>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Minimal 8 karakter</div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-floating">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                          name="password_confirmation" id="modalPasswordConfirmation"
                          placeholder="Konfirmasi Kata Sandi" required>
                        <label for="modalPasswordConfirmation">Konfirmasi Kata Sandi <span
                            class="text-danger">*</span></label>
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="mt-3">
                    <small class="text-muted">
                      <i class="bi bi-info-circle me-1"></i>
                      Pastikan kata sandi mudah diingat namun sulit ditebak
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- Role (Opsional - jika ada) -->
            @if(auth()->user()->is_admin || auth()->user()->role == 'admin')
            <div class="col-12">
              <div class="card border-0 bg-light-subtle">
                <div class="card-body">
                  <h6 class="mb-3 pb-2 border-bottom">
                    <i class="bi bi-person-badge me-2"></i>Hak Akses (Opsional)
                  </h6>
                  <div>
                    <label class="form-label">Role Pengguna</label>
                    <div class="d-flex gap-3">
                      <div class="form-check">
                        <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role"
                          id="modalRoleUser" value="user" {{ old('role', 'user' )=='user' ? 'checked' : '' }}>
                        <label class="form-check-label" for="modalRoleUser">
                          <span class="badge bg-secondary-subtle text-secondary-emphasis">User</span>
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role"
                          id="modalRoleAdmin" value="admin" {{ old('role')=='admin' ? 'checked' : '' }}>
                        <label class="form-check-label" for="modalRoleAdmin">
                          <span class="badge bg-primary-subtle text-primary-emphasis">Admin</span>
                        </label>
                      </div>
                    </div>
                    @error('role')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                      <small class="text-muted">
                        Admin memiliki akses penuh ke semua fitur
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
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
