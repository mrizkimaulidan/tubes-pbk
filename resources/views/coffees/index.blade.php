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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coffe as $kopi)
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
