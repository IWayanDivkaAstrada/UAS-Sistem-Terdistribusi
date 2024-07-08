<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 56px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand nav-link" href="{{ url('perpustakaan/index') }}">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bukus.index') }}">Daftar Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('penulis.index') }}">Penulis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peminjam.index') }}">Daftar Peminjam</a>
                    </li>                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-primary text-white">
        <div class="container text-center">
            <h1>Selamat Datang di Perpustakaan</h1>
            <p class="lead">Tempat terbaik untuk menemukan buku yang Anda cari</p>
        </div>
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>&copy; 2024 Perpustakaan. All Rights Reserved.</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
