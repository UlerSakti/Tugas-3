<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kalkulator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white text-center">
            <h4>Kalkulator Multiguna</h4>
        </div>
        <div class="card-body">

            {{-- 1. Tampilan Jika Terjadi Eror Validasi --}}
            @if(isset($hasError) && $hasError)
                <div class="alert alert-danger mb-0">
                    <h5 class="alert-heading">⚠️ Terjadi Kesalahan Input!</h5>
                    <hr>
                    <ul class="mb-0 ps-3">
                        @foreach($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            {{-- 2. Tampilan Jika Perhitungan Sukses --}}
            @else
                <div class="alert alert-success">
                    <h5 class="alert-heading">✅ Perhitungan Berhasil!</h5>
                    <hr>
                    <p class="mb-1"><strong>Operasi:</strong> {{ $operation }}</p>
                    <p class="mb-1"><strong>Rumus:</strong> {{ $formula }}</p>
                    <h3 class="mt-2 text-dark"><strong>Hasil:</strong> {{ $calculationResult }}</h3>
                </div>
            @endif

        </div>
    </div>
</body>
</html>