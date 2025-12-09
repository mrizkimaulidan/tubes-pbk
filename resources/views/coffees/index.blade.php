@extends('layouts.app')

@section('title', 'Halaman Daftar Kopi')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Kopi</h5>
                    <div class="col-12">

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#createModal">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coffee as $kopi)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $kopi->name }}</td>
                                        <td>{{ $kopi->price }}</td>
                                        <td>{{ $kopi->description }}</td>
                                        <td>
                                            <a href="{{ $kopi->image_url }}" target="_blank" class="btn btn-sm btn-info">
                                                🔍 Lihat
                                            </a>
                                        </td>

                                        <td>
                                            <div class="btn-group gap-1" role="group">
                                                <a href="{{ route('kopi.edit', $kopi) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('kopi.destroy', $kopi) }}" method="POST"
                                                    class="d-inline">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    @include('coffees.create')
@endpush
