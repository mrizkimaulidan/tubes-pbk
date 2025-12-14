@extends('layouts.app')

@section('title', 'Halaman Daftar Kopi')

@section('content')
<div class="container">
  <div class="row">
    @include('partials.alert')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Daftar Kopi</h5>

        <div class="d-flex justify-content-end">
          <div class="d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importModal">
              <i class="bi bi-file-earmark-excel"></i>
            </button>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
              <i class="bi bi-plus"></i>
            </button>
          </div>
        </div>

        <div class="col-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Rasa</th>
                <th scope="col">Intensitas</th>
                <th scope="col">Tingkat Kemanisan</th>
                <th scope="col">Level Susu</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($coffees as $coffee)
              <tr>
                <th scope="row">{{ $coffees->firstItem() + $loop->index }}</th>

                <td>
                  <div class="d-flex align-items-center mb-1">
                    <div class="fw-semibold">{{ $coffee->name }}</div>
                  </div>

                  <div class="d-flex flex-column gap-1 text-muted">
                    <div class="text-truncate" style="max-width: 300px;" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="{{ $coffee->description }}">
                      {{ $coffee->description }}
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="badge bg-success-subtle text-success-emphasis">
                        <i class="bi bi-cash-stack"></i>
                        {{ $coffee->price }}
                      </span>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="badge bg-secondary">
                        {{ $coffee->beans_type }}
                      </span>
                    </div>
                  </div>
                </td>

                <td>
                  <span class="badge bg-primary-subtle text-primary-emphasis">
                    {{ $coffee->taste }}
                  </span>
                </td>
                <td>
                  <span class="badge bg-warning-subtle text-warning-emphasis">
                    {{ $coffee->intensity }}
                  </span>
                </td>
                <td>
                  <span class="badge bg-primary-subtle text-primary-emphasis">
                    {{ $coffee->sweetness }}
                  </span>
                </td>
                <td>
                  <span class="badge bg-success-subtle text-success-emphasis">
                    {{ $coffee->milk_level }}
                  </span>
                </td>

                <td>
                  <img src="{{ asset('' . $coffee->image_url) }}" alt="{{ $coffee->name }}" class="rounded"
                    style="width: 100px; height: 100px; object-fit: cover;">
                </td>

                <td>
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
              @empty
              <tr>
                <td colspan="11" class="text-center text-muted">Belum ada data kopi.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
          {{ $coffees->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('coffees.create')
@include('coffees.import')
@endpush
