<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Aset - {{ $asset->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/katalog">🎨 3D Asset Store</a>
        </div>
    </nav>

    <div class="container">
        {{-- Notifikasi Sukses Pembelian --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <a href="/katalog" class="btn btn-secondary btn-sm mb-3">&larr; Kembali ke Katalog</a>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <span class="badge bg-primary mb-2">{{ $asset->category->name }}</span>
                <h2 class="fw-bold">{{ $asset->title }}</h2>
                <p class="text-muted">Diupload oleh: <strong>{{ $asset->user->name }}</strong></p>

                <hr>

                <h5 class="fw-bold">Deskripsi</h5>
                <p>{{ $asset->description }}</p>

                <div class="row my-4">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Versi Software:</strong> {{ $asset->blender_version }}</li>
                            <li class="list-group-item"><strong>File Path:</strong> {{ $asset->file_path }}</li>
                        </ul>
                    </div>
                </div>
                <h3 class="text-success fw-bold {{ session('success') ? 'mb-0' : 'mb-3' }}">Rp {{ number_format($asset->price, 0, ',', '.') }}</h3>

                @if(!session('success'))
                <a href="/katalog/buy/{{ $asset->id }}" class="btn btn-success btn-lg">Beli Aset Sekarang</a>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>