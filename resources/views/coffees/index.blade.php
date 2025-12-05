@extends('layouts.app')

@section('title', 'Halaman Daftar Kopi')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coffe as $kopi)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $kopi->name }}</td>
                                <td>{{ $kopi->price }}</td>
                                <td>{{ $kopi->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
