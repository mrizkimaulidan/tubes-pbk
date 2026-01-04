@extends('layouts.app')

@section('title', 'Ubah Kriteria')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Ubah Kriteria</h5>
            <a href="{{ route('kriteria.index') }}" class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
          </div>

          <form action="{{ route('kriteria.update', $criteria) }}" method="POST" id="editForm">
            @csrf
            @method('PUT')

            <div class="row g-3">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code"
                    placeholder="K1" value="{{ old('code', $criteria->code) }}" required>
                  <label for="code">Kode <span class="text-danger">*</span></label>
                  @error('code')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="Nama Kriteria" value="{{ old('name', $criteria->name) }}" required>
                  <label for="name">Nama Kriteria <span class="text-danger">*</span></label>
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-12">
                <div>
                  <label class="form-label">Tipe <span class="text-danger">*</span></label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input class="form-check-input @error('attribute') is-invalid @enderror" type="radio"
                        name="attribute" id="benefit" value="benefit" {{ old('attribute', $criteria->attribute) ==
                      'benefit' ? 'checked' : '' }} required>
                      <label class="form-check-label" for="benefit">
                        <span class="badge bg-primary-subtle text-primary-emphasis">Benefit</span>
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input @error('attribute') is-invalid @enderror" type="radio"
                        name="attribute" id="cost" value="cost" {{ old('attribute', $criteria->attribute) == 'cost' ?
                      'checked' : '' }} required>
                      <label class="form-check-label" for="cost">
                        <span class="badge bg-secondary-subtle text-secondary-emphasis">Cost</span>
                      </label>
                    </div>
                  </div>
                  @error('attribute')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                  <div class="form-text">
                    <small class="text-muted">
                      Benefit: semakin tinggi semakin baik | Cost: semakin rendah semakin baik
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Opsional"
                    name="description" id="description"
                    style="height: 100px">{{ old('description', $criteria->description) }}</textarea>
                  <label for="description">Deskripsi</label>
                  @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="form-text">Deskripsi opsional untuk memberikan penjelasan tentang kriteria</div>
                </div>
              </div>

              <div class="col-12">
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                  <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle me-1"></i> Batal
                  </a>
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
