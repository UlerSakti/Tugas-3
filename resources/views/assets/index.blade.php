<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Asset Store - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🎨 3D Asset Store</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4">Katalog Aset 3D Blender</h2>
        <div class="row">
            @foreach($assets as $asset)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $asset->category->name }}</span>
                        <h5 class="card-title fw-bold">{{ $asset->title }}</h5>
                        <p class="card-text text-muted small">{{ $asset->description }}</p>

                        <hr>
                        <p class="mb-1"><strong>Versi:</strong> {{ $asset->blender_version }}</p>
                        <p class="mb-1"><strong>Kreator:</strong> {{ $asset->user->name }}</p>
                        <p class="text-success fw-bold fs-5 mt-2">Rp {{ number_format($asset->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                        <a href="/katalog/{{ $asset->id }}" class="btn btn-outline-primary btn-sm w-100 me-2">Detail Aset</a>
                        <a href="/katalog/buy/{{ $asset->id }}" class="btn btn-success btn-sm w-100">Beli Aset</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>

</html>