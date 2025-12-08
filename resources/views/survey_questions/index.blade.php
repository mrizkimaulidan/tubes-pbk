@extends('layouts.app')

@section('title', 'Halaman Daftar Survey Pertanyaan')

@section('content')
<div class="container">
  <div class="row">
    @include('partials.alert')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Daftar Survey Pertanyaan</h5>

        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus"></i>
          </button>
        </div>

        <div class="col-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kriteria</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($surveyQuestions as $question)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>

                <td>
                  <div class="d-flex align-items-center mb-1">
                    <span class="badge bg-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-subtle
                       text-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-emphasis me-2">
                      {{ $question->criteria->code }}
                    </span>
                    <div class="fw-semibold">{{ $question->criteria->name }}</div>
                  </div>

                  <div class="d-flex align-items-center gap-2 small text-muted">
                    <span>Bobot: {{ $question->criteria->weight }}</span>
                    <i class="bi bi-dot"></i>
                    <span>Bahasa: {{ $question->locale }}</span>
                    <i class="bi bi-dot"></i>
                    <span class="badge bg-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-subtle
                       text-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-emphasis">
                      {{ $question->criteria->attribute }}
                    </span>
                  </div>
                </td>

                <td>
                  <div class="text-truncate" style="max-width: 300px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ $question->content }}">
                    {{ $question->content }}
                  </div>

                  <div class="small text-muted mt-1">
                    <span class="badge bg-info-subtle text-info-emphasis">
                      Urutan: {{ $question->sort_order }}
                    </span>
                  </div>
                </td>

                <td>
                  <div class="btn-group gap-1" role="group">
                    <a href="{{ route('pertanyaan.edit', $question) }}" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('pertanyaan.destroy', $question) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $surveyQuestions->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('criterias.create')
@endpush
