@extends('layouts.app')

@section('content')

<h2>Data Peminjaman</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>User</th>
        <th>Buku</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($borrowings as $borrowing)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $borrowing->user->name }}</td>
        <td>{{ $borrowing->book->title }}</td>
        <td>{{ $borrowing->status }}</td>

        <td>

            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST">

                @csrf
                @method('PUT')

                <button type="submit">
                    Return
                </button>

            </form>

            <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>

            </form>

        </td>
    </tr>
    @endforeach

</table>

@endsection