@extends('layouts.app')

@section('title', 'Halaman Daftar Kriteria')

@section('content')
<div class="container">
  <div class="row">
    @include('partials.alert')

    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">Daftar Kriteria</h5>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col" class="d-none d-md-table-cell">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col" class="d-none d-md-table-cell">Atribut</th>
                <th scope="col" class="d-none d-lg-table-cell">Deskripsi</th>
                <th scope="col" class="d-none d-md-table-cell">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($criterias as $criteria)
              {{-- Main Row --}}
              <tr class="position-relative" data-bs-toggle="collapse" data-bs-target="#collapse{{ $criteria->id }}"
                aria-expanded="false" aria-controls="collapse{{ $criteria->id }}" role="button">

                <th scope="row" class="align-middle">
                  {{ $loop->iteration }}
                </th>

                <td class="align-middle d-none d-md-table-cell">
                  {{ $criteria->code }}
                </td>

                <td class="align-middle">
                  <div class="d-flex justify-content-between align-items-center">
                    <span>{{ $criteria->name }}</span>
                    <i class="bi bi-chevron-down d-md-none"></i>
                  </div>
                </td>

                <td class="align-middle d-none d-md-table-cell">
                  <span class="badge bg-{{ $criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-subtle
                            text-{{ $criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-emphasis">
                    {{ $criteria->attribute }}
                  </span>
                </td>

                <td class="align-middle d-none d-lg-table-cell">
                  <span class="text-muted d-inline-block text-truncate" style="max-width: 18rem;"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $criteria->description }}">
                    {{ $criteria->description ?? '-' }}
                  </span>
                </td>

                <td class="align-middle d-none d-md-table-cell">
                  <div class="btn-group gap-1" role="group">
                    <a href="{{ route('kriteria.edit', $criteria) }}" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('kriteria.destroy', $criteria) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>

              {{-- Mobile Collapse Row --}}
              <tr class="d-md-none">
                <td colspan="6" class="p-0 border-0">
                  <div class="collapse" id="collapse{{ $criteria->id }}">
                    <div class="card card-body m-2">

                      <div class="row g-3 mb-3">
                        <div class="col-6">
                          <div>
                            <div class="text-muted small mb-1">Kode</div>
                            <div class="fw-semibold">{{ $criteria->code }}</div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div>
                            <div class="text-muted small mb-1">Atribut</div>
                            <span class="badge bg-{{ $criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-subtle
                                      text-{{ $criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-emphasis">
                              {{ $criteria->attribute }}
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="mb-3">
                        <div class="text-muted small mb-1">Deskripsi</div>
                        <div class="text-break text-wrap lh-sm">
                          {{ $criteria->description ?? '-' }}
                        </div>
                      </div>

                      <div class="d-flex gap-2">
                        <a href="{{ route('kriteria.edit', $criteria) }}" class="btn btn-warning btn-sm flex-fill">
                          <i class="bi bi-pencil-square me-1"></i> Ubah
                        </a>
                        <form action="{{ route('kriteria.destroy', $criteria) }}" method="POST"
                          class="d-inline flex-fill">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm w-100"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">
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

        {{ $criterias->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('criterias.create')
@endpush
