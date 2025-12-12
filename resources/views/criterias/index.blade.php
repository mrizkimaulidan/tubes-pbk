@extends('layouts.app')

@section('title', 'Halaman Daftar Kriteria')

@section('content')
<div class="container">
  <div class="row">
    @include('partials.alert')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Daftar Kriteria</h5>

        <div class="d-flex justify-content-end">
          {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus"></i>
          </button> --}}
        </div>

        <div class="col-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Bobot</th>
                <th scope="col">Atribut</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($criterias as $criteria)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $criteria->code }}</td>
                <td>{{ $criteria->name }}</td>
                <td>
                  <span class="fw-bold">{{ $criteria->weight }}</span>
                </td>
                <td>
                  <span
                    class="badge bg-{{ $criteria->attribute == 'benefit' ? 'primary' : 'secondary' }}-subtle text-primary-emphasis">{{
                    $criteria->attribute }}</span>
                </td>
                <td>
                  <span class="text-muted d-inline-block text-truncate" style="max-width: 18rem;"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $criteria->description }}">
                    {{ $criteria->description ?? '-' }}
                  </span>
                </td>
                <td>
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
