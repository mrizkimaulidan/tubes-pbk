@extends('layouts.app')

@section('title', 'Halaman Daftar Pengguna')

@section('content')
<div class="container">
  <div class="row">
    @include('partials.alert')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Daftar Pengguna</h5>

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
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Alamat Email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->name }}</td>
                <td>
                  <span class="badge text-bg-secondary">
                    {{ $user->email }}
                  </span>
                </td>
                <td>
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
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('users.create')
@endpush
