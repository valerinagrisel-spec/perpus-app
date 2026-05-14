@extends('layouts.app')

@section('content')
<h3>Dashboard</h3>

<p>Total Buku: {{ $totalBooks }}</p>
<p>Total Kategori: {{ $totalCategories }}</p>
<p>Total Peminjaman: {{ $totalBorrowings }}</p>

@if(auth()->user()->role === 'admin')
<p>Anda login sebagai admin. Anda dapat mengelola kategori, buku, dan data peminjaman.</p>
@else
<p>Anda login sebagai member. Anda dapat melihat dan meminjam buku.</p>
@endif
@endsection