@extends('layouts.app')

@section('title', 'Halaman Daftar Survey Pertanyaan')

@section('content')
<div class="container">
  <div class="row">
    @include('partials.alert')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">Daftar Survey Pertanyaan</h5>

        <div class="d-flex justify-content-end mb-3">
          {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus"></i>
            <span class="d-none d-md-inline">Tambah Pertanyaan</span>
          </button> --}}
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col" class="d-none d-md-table-cell">Kriteria</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col" class="d-none d-lg-table-cell">Opsi Jawaban</th>
                <th scope="col" class="d-none d-md-table-cell">Bahasa</th>
                <th scope="col" class="d-none d-md-table-cell">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($surveyQuestions as $question)
              {{-- Main Row --}}
              <tr class="position-relative" data-bs-toggle="collapse"
                data-bs-target="#collapseQuestion{{ $question->id }}" aria-expanded="false"
                aria-controls="collapseQuestion{{ $question->id }}" role="button">

                <th scope="row" class="align-middle">
                  {{ $surveyQuestions->firstItem() + $loop->index }}
                </th>

                <td class="align-middle d-none d-md-table-cell">
                  <div class="d-flex flex-column">
                    <div class="d-flex align-items-center mb-1">
                      <span
                        class="badge bg-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-subtle
                         text-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-emphasis me-2">
                        {{ $question->criteria->code }}
                      </span>
                      <div class="fw-semibold text-truncate" style="max-width: 150px;">
                        {{ $question->criteria->name }}
                      </div>
                    </div>
                    <span class="badge bg-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-subtle
                       text-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-emphasis">
                      {{ $question->criteria->attribute }}
                    </span>
                  </div>
                </td>

                <td class="align-middle">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="text-truncate" style="max-width: 250px;">
                        {{ $question->content }}
                      </div>
                      <div class="small text-muted mt-1">
                        <span class="badge bg-info-subtle text-info-emphasis">
                          Urutan: {{ $question->sort_order }}
                        </span>
                      </div>
                    </div>
                    <i class="bi bi-chevron-down d-md-none"></i>
                  </div>
                </td>

                <td class="align-middle d-none d-lg-table-cell">
                  <span class="badge bg-success-subtle text-success-emphasis">
                    {{ $question->survey_question_options_count }} opsi
                  </span>
                </td>

                <td class="align-middle d-none d-md-table-cell">
                  <span class="badge bg-warning-subtle text-warning-emphasis">
                    {{ $question->locale }}
                  </span>
                </td>

                <td class="align-middle d-none d-md-table-cell">
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

              {{-- Mobile Collapse Row --}}
              <tr class="d-md-none">
                <td colspan="6" class="p-0 border-0">
                  <div class="collapse" id="collapseQuestion{{ $question->id }}">
                    <div class="card card-body m-2">

                      <div class="row g-3 mb-3">
                        <div class="col-12">
                          <div>
                            <div class="text-muted small mb-1">Kriteria</div>
                            <div class="d-flex align-items-center">
                              <span
                                class="badge bg-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-subtle
                                 text-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-emphasis me-2">
                                {{ $question->criteria->code }}
                              </span>
                              <div class="fw-semibold">{{ $question->criteria->name }}</div>
                            </div>
                            <div class="mt-1">
                              <span
                                class="badge bg-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-subtle
                                 text-{{ $question->criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-emphasis">
                                {{ $question->criteria->attribute }}
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="col-6">
                          <div>
                            <div class="text-muted small mb-1">Bahasa</div>
                            <span class="badge bg-warning-subtle text-warning-emphasis">
                              {{ $question->locale }}
                            </span>
                          </div>
                        </div>

                        <div class="col-6">
                          <div>
                            <div class="text-muted small mb-1">Opsi Jawaban</div>
                            <span class="badge bg-success-subtle text-success-emphasis">
                              {{ $question->survey_question_options_count }} opsi
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="mb-3">
                        <div class="text-muted small mb-1">Pertanyaan Lengkap</div>
                        <div class="text-break text-wrap lh-sm">
                          {{ $question->content }}
                        </div>
                      </div>

                      <div class="d-flex gap-2">
                        <a href="{{ route('pertanyaan.edit', $question) }}" class="btn btn-warning btn-sm flex-fill">
                          <i class="bi bi-pencil-square me-1"></i> Ubah
                        </a>
                        <form action="{{ route('pertanyaan.destroy', $question) }}" method="POST"
                          class="d-inline flex-fill">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm w-100"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')">
                            <i class="bi bi-trash me-1"></i> Hapus
                          </button>
                        </form>
                      </div>

                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        @if($surveyQuestions->isEmpty())
        <div class="text-center text-muted py-4">
          Belum ada data pertanyaan survey.
        </div>
        @endif

        {{ $surveyQuestions->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('survey_questions.create')
@endpush
