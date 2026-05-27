<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #1e293b;
        }

        .navbar-brand {
            font-weight: 600;
            color: white !important;
        }

        .nav-link {
            color: #e2e8f0 !important;
            margin-right: 10px;
        }

        .nav-link:hover {
            color: white !important;
        }

        .main-content {
            padding: 30px;
        }

        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
        }

        .btn-success {
            border: none;
        }

        .btn-danger {
            border: none;
        }

        .btn-warning {
            border: none;
            color: white;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px;
        }

        .form-label {
            font-weight: 500;
        }

        .page-title {
            font-weight: 700;
            margin-bottom: 25px;
            color: #1e293b;
        }

        .alert {
            border-radius: 10px;
        }

        .badge-role {
            background-color: #e5e7eb;
            color: #374151;
            font-size: 12px;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            color: gray;
            font-size: 14px;
        }
    </style>
</head>

<body>

    @auth

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

            <a class="navbar-brand" href="/dashboard">
                📚 Sistem Perpustakaan
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">
                            Buku
                        </a>
                    </li>

                    @if(auth()->user()->role == 'admin')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            Kategori
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('borrow.index') }}">
                            Peminjaman
                        </a>
                    </li>

                    @endif

                    @if(auth()->user()->role == 'member')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('borrow.my') }}">
                            Riwayat Saya
                        </a>
                    </li>

                    @endif

                </ul>

                <div class="d-flex align-items-center gap-3">

                    <span class="text-white">
                        {{ auth()->user()->name }}
                    </span>

                    <span class="badge-role">
                        {{ auth()->user()->role }}
                    </span>

                    <form action="{{ route('logout') }}"
                        method="POST">

                        @csrf

                        <button class="btn btn-danger btn-sm">
                            Logout
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </nav>

    @endauth

    <!-- CONTENT -->
    <div class="container main-content">

        {{-- SUCCESS --}}
        @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @endif

        {{-- ERROR --}}
        @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

        @endif

        {{-- VALIDATION --}}
        @if($errors->any())

        <div class="alert alert-danger">
            <ul class="mb-0">

                @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>
        </div>

        @endif

        @yield('content')

        <div class="footer">
            © 2026 Sistem Perpustakaan
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>