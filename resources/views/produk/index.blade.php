<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Bowo Jok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #002b5c;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #ff3b3b !important;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .btn-detail {
            background-color: #002b5c;
            color: white;
        }
        .btn-detail:hover {
            background-color: #ff3b3b;
            color: white;
        }
        .search-box {
            max-width: 400px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg fixed-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Bowo Jok</a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('produk.index') }}">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kontak.index') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Header --}}
    <section class="py-5 text-center text-light" style="background: linear-gradient(90deg, #002b5c, #ff3b3b); margin-top: 56px;">
        <div class="container py-4">
            <h1 class="fw-bold">Katalog Produk Bowo Jok</h1>
            <p class="lead">Temukan berbagai pilihan jok berkualitas tinggi untuk motor, mobil, bus, dan kapal.</p>
        </div>
    </section>

    {{-- Search Bar --}}
    <div class="container text-center my-4">
        <form action="{{ route('produk.index') }}" method="GET" class="d-flex justify-content-center">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control search-box me-2" placeholder="Cari produk...">
            <button type="submit" class="btn btn-detail"><i class="bi bi-search"></i> Cari</button>
        </form>
    </div>

    {{-- Produk Grid --}}
    <div class="container py-5">
        <div class="row g-4">
            @forelse ($produk as $item)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('images/produk/' . $item->gambar_produk) }}" class="card-img-top" alt="{{ $item->nama_produk }}" style="height: 250px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $item->nama_produk }}</h5>
                            <p class="text-danger fw-semibold mb-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('produk.show', $item->id) }}" class="btn btn-detail btn-sm mt-2">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <p class="text-muted">Tidak ada produk ditemukan.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $produk->links() }}
        </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center py-3 bg-dark text-white mt-5">
        <p class="mb-0">&copy; {{ date('Y') }} Bowo Jok. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
