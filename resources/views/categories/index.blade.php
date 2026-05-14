@extends('layouts.app')

@section('content')
<h3>Data Kategori</h3>

<a href="{{ route('categories.create') }}">Tambah Kategori</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>

    @foreach($categories as $category)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td>
            <a href="{{ route('categories.show', $category) }}">Detail</a>
            |
            <a href="{{ route('categories.edit', $category) }}">Edit</a>
            |
            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button onclick="return confirm('Yakin hapus kategori ini?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection