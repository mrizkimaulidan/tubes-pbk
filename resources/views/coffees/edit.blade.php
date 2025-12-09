@extends('layouts.app')

@section('title', 'Ubah Data Coffee')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ubah Data Kopi</h5>

                        <form action="{{ route('kopi.update', $coffee) }}" method="POST" id="editForm">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nama Kopi" value="{{ $coffee->name }}" required>
                                <label for="name">Nama Kopi <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" step="1" min="0" class="form-control" name="price"
                                    id="price" placeholder="Masukkan price" value="{{ $coffee->price }}" required>
                                <label for="price">Harga<span class="text-danger">*</span></label>
                            </div>

                            <div class="mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Opsional" name="description" id="description" style="height: 100px">{{ $coffee->description }}</textarea>
                                    <label for="description">Deskripsi</label>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="url" class="form-control" name="image_url" id="image_url"
                                    placeholder="https://example.com/gambar.jpg" value="{{ $coffee->image_url }}" required>
                                <label for="image_url">Image URL <span class="text-danger">*</span></label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('kopi.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
