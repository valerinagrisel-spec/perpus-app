@extends('layouts.app')

@section('content')

<h1>Daftar Buku</h1>

@if(session('success'))
<p style="color:green">
    {{ session('success') }}
</p>
@endif

<a href="{{ route('books.create') }}">
    Tambah Buku
</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Author</th>
        <th>Kategori</th>
        <th>Stock</th>
        <th>Aksi</th>
    </tr>

    @foreach($books as $book)

    <tr>
        <td>{{ $loop->iteration }}</td>

        <td>{{ $book->title }}</td>

        <td>{{ $book->author }}</td>

        <td>{{ $book->category->name }}</td>

        <td>{{ $book->stock }}</td>

        <td>

            <a href="{{ route('books.show', $book->id) }}">
                Detail
            </a>

            |

            <a href="{{ route('books.edit', $book->id) }}">
                Edit
            </a>

            |

            <form action="{{ route('books.destroy', $book->id) }}"
                method="POST"
                style="display:inline">

                @csrf
                @method('DELETE')

                <button type="submit"
                    onclick="return confirm('Yakin hapus buku?')">

                    Hapus

                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

@endsection