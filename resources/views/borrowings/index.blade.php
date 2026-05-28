@extends('layouts.app')

@section('content')

<style>
    .borrow-container {
        padding: 40px;
    }

    .borrow-title {
        font-size: 55px;
        font-weight: bold;
        margin-bottom: 35px;
    }

    .borrow-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .borrow-table {
        width: 100%;
        border-collapse: collapse;
    }

    .borrow-table thead {
        background: #1e293b;
        color: white;
    }

    .borrow-table th {
        padding: 18px;
        text-align: left;
    }

    .borrow-table td {
        padding: 18px;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    .borrow-table tr:hover {
        background: #f9fafb;
    }

    .status-returned {
        background: #dcfce7;
        color: #166534;
        padding: 7px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .status-borrowed {
        background: #fef3c7;
        color: #92400e;
        padding: 7px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .action-group {
        display: flex;
        gap: 10px;
    }

    .return-button {
        background: #2563eb;
        color: white;
        border: none;
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
    }

    .delete-button {
        background: #fee2e2;
        color: #dc2626;
        border: none;
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
    }
</style>

<div class="borrow-container">

    <div class="borrow-title">
        Data Peminjaman
    </div>

    <div class="borrow-card">

        <table class="borrow-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Status</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($borrowings as $index => $borrowing)

                <tr>

                    <td>{{ $index + 1 }}</td>

                    <td>
                        {{ $borrowing->user->name }}
                    </td>

                    <td>
                        {{ $borrowing->book->title }}
                    </td>

                    <td>

                        @if($borrowing->status == 'returned')

                        <span class="status-returned">
                            Sudah Dikembalikan
                        </span>

                        @else

                        <span class="status-borrowed">
                            Dipinjam
                        </span>

                        @endif

                    </td>

                    <td>

                        <div class="action-group">

                            @if($borrowing->status != 'returned')

                            <form action="{{ route('borrow.return', $borrowing->id) }}"
                                method="POST">

                                @csrf
                                @method('PUT')

                                <button type="submit"
                                    class="return-button">

                                    Return

                                </button>

                            </form>

                            @endif

                            <form action="{{ route('borrowings.destroy', $borrowing->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="delete-button">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection