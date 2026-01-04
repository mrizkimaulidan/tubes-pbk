@extends('layouts.app')

@section('title', 'Halaman Daftar Pengguna')

@section('content')
<div class="container">
  <div class="row">
    @include('partials.alert')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">Daftar Pengguna</h5>

        <div class="d-flex justify-content-end mb-3">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus"></i>
            <span class="d-none d-md-inline">Tambah Pengguna</span>
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col" class="d-none d-md-table-cell">Alamat Email</th>
                <th scope="col" class="d-none d-md-table-cell">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              {{-- Main Row --}}
              <tr class="position-relative" data-bs-toggle="collapse" data-bs-target="#collapseUser{{ $user->id }}"
                aria-expanded="false" aria-controls="collapseUser{{ $user->id }}" role="button">

                <th scope="row" class="align-middle">
                  {{ $users->firstItem() + $loop->index }}
                </th>

                <td class="align-middle">
                  <div class="d-flex justify-content-between align-items-center">
                    <span>{{ $user->name }}</span>
                    <i class="bi bi-chevron-down d-md-none"></i>
                  </div>
                </td>

                <td class="align-middle d-none d-md-table-cell">
                  <span class="badge text-bg-secondary">
                    {{ $user->email }}
                  </span>
                </td>

                <td class="align-middle d-none d-md-table-cell">
                  <div class="btn-group gap-1" role="group">
                    <a href="{{ route('pengguna.edit', $user) }}" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('pengguna.destroy', $user) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>

              {{-- Mobile Collapse Row --}}
              <tr class="d-md-none">
                <td colspan="5" class="p-0 border-0">
                  <div class="collapse" id="collapseUser{{ $user->id }}">
                    <div class="card card-body m-2">

                      <div class="row g-3 mb-3">
                        <div class="col-12">
                          <div>
                            <div class="text-muted small mb-1">Email</div>
                            <span class="badge text-bg-secondary">
                              {{ $user->email }}
                            </span>
                          </div>
                        </div>

                        @if($user->role)
                        <div class="col-12">
                          <div>
                            <div class="text-muted small mb-1">Role</div>
                            <span class="badge bg-info-subtle text-info-emphasis">
                              {{ $user->role }}
                            </span>
                          </div>
                        </div>
                        @endif
                      </div>

                      <div class="d-flex gap-2">
                        <a href="{{ route('pengguna.edit', $user) }}" class="btn btn-warning btn-sm flex-fill">
                          <i class="bi bi-pencil-square me-1"></i> Ubah
                        </a>
                        <form action="{{ route('pengguna.destroy', $user) }}" method="POST" class="d-inline flex-fill">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm w-100"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
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

        @if($users->isEmpty())
        <div class="text-center text-muted py-4">
          Belum ada data pengguna.
        </div>
        @endif

        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('users.create')
@endpush
