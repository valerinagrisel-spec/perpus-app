@extends('layouts.app')

@section('content')
<h1>Detail Buku</h1>

<p>Judul: {{ $book->title }}</p>
<p>Author: {{ $book->author }}</p>
<p>Kategori: {{ $book->category->name }}</p>
<p>Publisher: {{ $book->publisher }}</p>
<p>Tahun: {{ $book->year }}</p>
<p>Stock: {{ $book->stock }}</p>

<a href="{{ route('books.index') }}">Kembali</a>
@endsections