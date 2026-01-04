@extends('layouts.app')

@section('title', 'Halaman Daftar Kopi')

@section('content')
<div class="container">
  <div class="row">
    @include('partials.alert')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">Daftar Kopi</h5>

        <div class="d-flex justify-content-end mb-3">
          <div class="d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importModal">
              <i class="bi bi-file-earmark-excel"></i>
              <span class="d-none d-md-inline">Import</span>
            </button>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
              <i class="bi bi-plus"></i>
              <span class="d-none d-md-inline">Tambah Kopi</span>
            </button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col" class="d-none d-md-table-cell">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col" class="d-none d-lg-table-cell">Rasa</th>
                <th scope="col" class="d-none d-lg-table-cell">Intensitas</th>
                <th scope="col" class="d-none d-md-table-cell">Tingkat Kemanisan</th>
                <th scope="col" class="d-none d-md-table-cell">Level Susu</th>
                <th scope="col" class="d-none d-md-table-cell">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($coffees as $coffee)
              {{-- Main Row --}}
              <tr class="position-relative" data-bs-toggle="collapse" data-bs-target="#collapseCoffee{{ $coffee->id }}"
                aria-expanded="false" aria-controls="collapseCoffee{{ $coffee->id }}" role="button">

                <th scope="row" class="align-middle">
                  {{ $coffees->firstItem() + $loop->index }}
                </th>

                <td class="align-middle d-none d-md-table-cell">
                  <img src="{{ asset('storage/' . $coffee->image_url) }}" alt="{{ $coffee->name }}" class="rounded"
                    style="width: 50px; height: 50px; object-fit: cover;">
                </td>

                <td class="align-middle">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">{{ $coffee->name }}</div>
                      <div class="text-muted small">
                        <span class="badge bg-secondary">
                          {{ $coffee->beans_type }}
                        </span>
                      </div>
                    </div>
                    <i class="bi bi-chevron-down d-md-none"></i>
                  </div>
                </td>

                <td class="align-middle d-none d-lg-table-cell">
                  <span class="badge bg-primary-subtle text-primary-emphasis">
                    {{ $coffee->taste }}
                  </span>
                </td>

                <td class="align-middle d-none d-lg-table-cell">
                  <span class="badge bg-warning-subtle text-warning-emphasis">
                    {{ $coffee->intensity }}
                  </span>
                </td>

                <td class="align-middle d-none d-md-table-cell">
                  <span class="badge bg-primary-subtle text-primary-emphasis">
                    {{ $coffee->sweetness }}
                  </span>
                </td>

                <td class="align-middle d-none d-md-table-cell">
                  <span class="badge bg-success-subtle text-success-emphasis">
                    {{ $coffee->milk_level }}
                  </span>
                </td>

                <td class="align-middle d-none d-md-table-cell">
                  <div class="btn-group gap-1" role="group">
                    <a href="{{ route('kopi.edit', $coffee) }}" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('kopi.destroy', $coffee) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data kopi ini?')">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>

              {{-- Mobile Collapse Row --}}
              <tr class="d-md-none">
                <td colspan="8" class="p-0 border-0">
                  <div class="collapse" id="collapseCoffee{{ $coffee->id }}">
                    <div class="card card-body m-2">

                      <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $coffee->image_url) }}" alt="{{ $coffee->name }}"
                          class="rounded" style="width: 120px; height: 120px; object-fit: cover; margin: 0 auto;">
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-6">
                          <div>
                            <div class="text-muted small mb-1">Rasa</div>
                            <span class="badge bg-primary-subtle text-primary-emphasis">
                              {{ $coffee->taste }}
                            </span>
                          </div>
                        </div>
                        <div class="col-6">
                          <div>
                            <div class="text-muted small mb-1">Intensitas</div>
                            <span class="badge bg-warning-subtle text-warning-emphasis">
                              {{ $coffee->intensity }}
                            </span>
                          </div>
                        </div>
                        <div class="col-6">
                          <div>
                            <div class="text-muted small mb-1">Tingkat Kemanisan</div>
                            <span class="badge bg-primary-subtle text-primary-emphasis">
                              {{ $coffee->sweetness }}
                            </span>
                          </div>
                        </div>
                        <div class="col-6">
                          <div>
                            <div class="text-muted small mb-1">Level Susu</div>
                            <span class="badge bg-success-subtle text-success-emphasis">
                              {{ $coffee->milk_level }}
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="mb-3">
                        <div class="text-muted small mb-1">Deskripsi</div>
                        <div class="text-break text-wrap lh-sm">
                          {{ $coffee->description }}
                        </div>
                      </div>

                      <div class="row g-2 mb-3">
                        <div class="col-12">
                          <div class="text-muted small mb-1">Harga</div>
                          <span class="badge bg-success-subtle text-success-emphasis">
                            <i class="bi bi-cash-stack"></i>
                            {{ $coffee->formatted_price }}
                          </span>
                        </div>
                      </div>

                      <div class="d-flex gap-2">
                        <a href="{{ route('kopi.edit', $coffee) }}" class="btn btn-warning btn-sm flex-fill">
                          <i class="bi bi-pencil-square me-1"></i> Ubah
                        </a>
                        <form action="{{ route('kopi.destroy', $coffee) }}" method="POST" class="d-inline flex-fill">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm w-100"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data kopi ini?')">
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

        @if($coffees->isEmpty())
        <div class="text-center text-muted py-4">
          Belum ada data kopi.
        </div>
        @endif

        {{ $coffees->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('coffees.create')
@include('coffees.import')
@endpush

@push('javascript')
@include('coffees.script')
@endpush
