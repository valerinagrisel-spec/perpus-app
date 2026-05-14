@extends('layouts.app')

@section('content')
<h3>Edit Kategori</h3>

@if($errors->any())
<ul style="color:red;">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Kategori</label><br>
    <input type="text" name="name" value="{{ old('name', $category->name) }}"><br><br>

    <label>Deskripsi</label><br>
    <textarea name="description">{{ old('description', $category->description) }}</textarea><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('categories.index') }}">Kembali</a>
</form>
@endsection