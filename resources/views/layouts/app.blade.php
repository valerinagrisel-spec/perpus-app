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

    <a href="{{ route('books.index') }}">
        Daftar Buku
    </a>

    {{-- MENU MEMBER --}}
    @if(auth()->user()->role === 'member')

    | <a href="{{ route('borrow.my') }}">
        Riwayat Peminjaman
    </a>

    @endif

    {{-- MENU ADMIN --}}
    @if(auth()->user()->role === 'admin')

    | <a href="{{ route('categories.index') }}">
        Kategori
    </a>

    | <a href="{{ route('borrow.index') }}">
        Data Peminjaman
    </a>

    @endif

    <form action="{{ route('logout') }}"
        method="POST"
        style="display:inline;">

        @csrf

        <button type="submit">
            Logout
        </button>

    </form>

    @endauth

    <hr>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))

    <p style="color: green;">
        {{ session('success') }}
    </p>

    @endif

    {{-- ALERT ERROR --}}
    @if(session('error'))

    <p style="color: red;">
        {{ session('error') }}
    </p>

    @endif

    @yield('content')

</body>

</html>