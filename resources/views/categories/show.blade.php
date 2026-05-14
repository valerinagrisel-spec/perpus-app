@extends('layouts.app')

@section('content')
<h3>Detail Kategori</h3>

<p>Nama Kategori: {{ $category->name }}</p>
<p>Deskripsi: {{ $category->description }}</p>

<h4>Daftar Buku dalam Kategori Ini</h4>

@forelse($category->books as $book)
<p>{{ $book->title }}</p>
@empty
<p>Belum ada buku dalam kategori ini.</p>
@endforelse

<a href="{{ route('categories.index') }}">Kembali</a>
@endsection