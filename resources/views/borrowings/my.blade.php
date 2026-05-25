@extends('layouts.app')

@section('content')
<h1>Riwayat Peminjaman Saya</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Status</th>
    </tr>

    @forelse($borrowings as $borrowing)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $borrowing->book->title }}</td>
        <td>{{ $borrowing->borrow_date }}</td>
        <td>{{ $borrowing->status }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="4">Belum ada peminjaman</td>
    </tr>
    @endforelse
</table>
@endsection