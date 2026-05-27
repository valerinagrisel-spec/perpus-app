@extends('layouts.app')

@section('content')

<style>
    .history-container {
        padding: 40px;
    }

    .history-title {
        font-size: 55px;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .history-card {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    .history-table {
        width: 100%;
        border-collapse: collapse;
    }

    .history-table th {
        background: #2563eb;
        color: white;
        padding: 15px;
        text-align: left;
        font-size: 18px;
    }

    .history-table td {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        font-size: 18px;
    }

    .history-table tr:hover {
        background: #f3f4f6;
    }

    .status-returned {
        background: #16a34a;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 14px;
    }

    .status-borrowed {
        background: #f59e0b;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 14px;
    }
</style>

<div class="history-container">

    <div class="history-title">
        Riwayat Peminjaman Saya
    </div>

    <div class="history-card">

        <table class="history-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse($borrowings as $index => $borrowing)

                <tr>

                    <td>{{ $index + 1 }}</td>

                    <td>
                        {{ $borrowing->book->title }}
                    </td>

                    <td>
                        {{ $borrowing->borrow_date }}
                    </td>

                    <td>

                        @if($borrowing->status == 'returned')

                        <span class="status-returned">
                            Returned
                        </span>

                        @else

                        <span class="status-borrowed">
                            Borrowed
                        </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4">
                        Belum ada riwayat peminjaman.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection