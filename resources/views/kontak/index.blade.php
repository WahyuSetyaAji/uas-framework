<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Bowo Jok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            scroll-behavior: smooth;
        }
        .section-title {
            color: #002b5c;
            font-weight: 700;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Kontak Section --}}
    <section class="py-5 bg-light" style="margin-top: 56px;">
        <div class="container text-center">
            <h2 class="section-title">Hubungi Kami</h2>

            @if($kontak)
                <div class="card shadow-sm border-0 mx-auto" style="max-width: 500px;">
                    <div class="card-body">
                        <p><i class="bi bi-geo-alt-fill text-danger"></i> {{ $kontak->alamat }}</p>
                        <p><i class="bi bi-envelope-fill text-primary"></i> {{ $kontak->email_kontak }}</p>
                        <p><i class="bi bi-telephone-fill text-success"></i> {{ $kontak->no_kontak }}</p>
                    </div>
                </div>
            @else
                <p class="text-muted">Data kontak belum tersedia.</p>
            @endif

            <div class="mt-4">
                <a href="https://www.facebook.com/galeri.b.jok?locale=id_ID" target="_blank" class="btn btn-primary me-2">
                    <i class="bi bi-facebook"></i> Facebook
                </a>
                <a href="https://wa.me/6281295588338" target="_blank" class="btn btn-success">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
