@extends('layouts.app')

@section('title', 'Ubah Kriteria')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ubah Kriteria</h5>

          <form action="{{ route('kriteria.update', $criteria) }}" method="POST" id="editForm">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="code" id="code" placeholder="K1"
                value="{{ $criteria->code }}" required>
              <label for="code">Kode <span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control " name="name" id="name" placeholder="Nama Kriteria"
                value="{{ $criteria->name }}" required>
              <label for="name">Nama Kriteria <span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
              <input type="number" step="0.01" min="0" max="1" class="form-control" name="weight" id="weight"
                placeholder="0.25" value="{{ $criteria->weight }}" required>
              <label for="weight">Bobot (0-1) <span class="text-danger">*</span></label>
            </div>

            <div class="mb-3">
              <label class="form-label">Tipe <span class="text-danger">*</span></label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="attribute" id="benefit" value="benefit" {{
                  $criteria->attribute == 'benefit' ? 'checked' : ''
                }} required>
                <label class="form-check-label" for="benefit">
                  Benefit (Semakin tinggi semakin baik)
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="attribute" id="cost" value="cost" {{
                  $criteria->attribute == 'cost' ? 'checked' : '' }}
                required>
                <label class="form-check-label" for="cost">
                  Cost (Semakin rendah semakin baik)
                </label>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Opsional" name="description" id="description"
                  style="height: 100px">{{ $criteria->description }}</textarea>
                <label for="description">Deskripsi</label>
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
