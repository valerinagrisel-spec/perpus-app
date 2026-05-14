<!DOCTYPE html>
<html>

<head>
    <title>Sistem Perpustakaan</title>
</head>

<body>
    <h2>Sistem Perpustakaan</h2>

    @auth
    <p>
        Login sebagai: {{ auth()->user()->name }}
        | Role: {{ auth()->user()->role }}
    </p>

    <a href="/dashboard">Dashboard</a> |
    <a href="{{ route('books.index') }}">Daftar Buku</a>

    @if(auth()->user()->role === 'admin')
    | <a href="{{ route('categories.index') }}">Kategori</a>
    | <a href="{{ route('borrow.index') }}">Data Peminjaman</a>
    @endif

    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @endauth

    <hr>

    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
    @endif

    @yield('content')
</body>

</html>