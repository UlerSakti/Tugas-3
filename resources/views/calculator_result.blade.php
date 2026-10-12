<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kalkulator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white">
            <h4>Hasil Perhitungan</h4>
        </div>
        <div class="card-body">
            <p><strong>Jenis Operasi:</strong> {{ $operation }}</p>
            <p><strong>Rumus:</strong> {{ $formula }}</p>
            <hr>
            <h3><strong>Hasil:</strong> {{ $result }}</h3>
        </div>
    </div>
</body>
</html>