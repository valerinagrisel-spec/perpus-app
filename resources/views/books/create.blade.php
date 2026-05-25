@extends('layouts.app')

@section('content')
<h1>Tambah Buku</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <label>Kategori</label>
    <select name="category_id">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
        @endforeach
    </select>

    <br><br>

    <label>Judul</label>
    <input type="text" name="title">

    <br><br>

    <label>Author</label>
    <input type="text" name="author">

    <br><br>

    <label>Publisher</label>
    <input type="text" name="publisher">

    <br><br>

    <label>Year</label>
    <input type="number" name="year">

    <br><br>

    <label>Stock</label>
    <input type="number" name="stock">

    <br><br>

    <button type="submit">Simpan</button>
</form>
@endsection