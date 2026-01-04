@session('success')
<div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
  <div class="d-flex align-items-center">
    <i class="bi bi-check-circle-fill me-3 fs-4"></i>
    <div class="flex-grow-1">
      <h6 class="alert-heading mb-1 fw-bold">
        Berhasil!
      </h6>
      <p class="mb-0">{{ session('success') }}</p>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endsession

@if($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <div class="d-flex align-items-center">
    <i class="bi bi-exclamation-circle-fill me-3 fs-4"></i>
    <div class="flex-grow-1">
      <h6 class="alert-heading mb-1 fw-bold">
        Perhatian!
      </h6>
      <p class="mb-0">{{ $errors->first() }}</p>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif
