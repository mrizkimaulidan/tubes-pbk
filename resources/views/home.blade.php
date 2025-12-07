<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-brown border-bottom border-body">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Admin</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <div class="container py-5">

        <div class="card shadow-sm p-4 mb-4">
            <h4 class="mb-3 text-center">Cari Rekomendasi</h4>

            <form>
                <div class="mb-3">
                    <label class="form-label">Rasa</label>
                    <select class="form-select">
                        <option value="">-- Pilih Rasa --</option>
                        <option>Pedas</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Intensitas</label>
                    <select class="form-select">
                        <option value="">-- Pilih Intensitas --</option>
                        <option>Rendah</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <select class="form-select">
                        <option value="">-- Pilih Rentang Harga --</option>
                        <option>Murah</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Cari Rekomendasi</button>
            </form>
        </div>

        <!-- HASIL REKOMENDASI (5 GAMBAR) -->
        <h5 class="mb-3">Hasil Rekomendasi</h5>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://tse1.mm.bing.net/th/id/OIP.S6DjMu0WRVARrIdmp3LM_QHaEK?pid=Api&P=0&h=180"
                        class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Rasa</li>
                            <li class="list-group-item">Intensitas</li>
                            <li class="list-group-item">Harga</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/200?random=2" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Rasa</li>
                            <li class="list-group-item">Intensitas</li>
                            <li class="list-group-item">Harga</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/200?random=2" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Rasa</li>
                            <li class="list-group-item">Intensitas</li>
                            <li class="list-group-item">Harga</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/200?random=2" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Rasa</li>
                            <li class="list-group-item">Intensitas</li>
                            <li class="list-group-item">Harga</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/200?random=2" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Rasa</li>
                            <li class="list-group-item">Intensitas</li>
                            <li class="list-group-item">Harga</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
