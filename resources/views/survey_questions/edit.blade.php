@extends('layouts.app')

@section('title', 'Ubah Pertanyaan')

@section('content')
<div class="container">
  @include('partials.alert')
  <div class="row d-flex justify-content-center">

    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ubah Pertanyaan</h5>

          <form action="{{ route('pertanyaan.update', $question) }}" method="POST" id="createForm">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
              <input type="text" value="{{ $question->criteria->code }}" class="form-control" disabled required>
              <label>Kriteria <span class="text-danger">*</span></label>
            </div>

            <div class="mb-3">
              <div class="form-floating">
                <textarea class="form-control" name="content" id="content"
                  style="height: 100px">{{ $question->content }}</textarea>
                <label for="content">Pertanyaan <span class="text-danger">*</span></label>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-floating">
                <select class="form-select" name="locale" id="locale">
                  <option selected>Pilih Bahasa</option>
                  <option value="id" @selected($question->locale == 'id')>Indonesia</option>
                  <option value="en" @selected($question->locale == 'en')>Inggris</option>
                </select>
                <label for="locale">Pilih Bahasa <span class="text-danger">*</span></label>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input type="number" value="{{ $question->sort_order }}" class="form-control" name="sort_order"
                id="sort_order" placeholder="Urutan Display" required>
              <label for="sort_order">Urutan Display <span class="text-danger">*</span></label>
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ route('pertanyaan.index') }}" class="btn btn-secondary">
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

    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Opsi Jawaban</h5>

          <ol class="list-group list-group-numbered">
            @foreach ($question->surveyQuestionOptions as $option)
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">{{ $option->label }}</div>
                {{ $option->description }}
              </div>
              <span class="badge bg-success-subtle text-success-emphasis">Nilai: {{ $option->value }}</span>
            </li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
