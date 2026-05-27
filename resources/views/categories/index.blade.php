@extends('layouts.app')

@section('content')

<style>
    .category-container {
        padding: 40px;
    }

    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .category-title {
        font-size: 55px;
        font-weight: bold;
    }

    .add-button {
        background: #2563eb;
        color: white;
        padding: 12px 20px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
    }

    .add-button:hover {
        background: #1d4ed8;
        color: white;
    }

    .category-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .category-table {
        width: 100%;
        border-collapse: collapse;
    }

    .category-table thead {
        background: #1e293b;
        color: white;
    }

    .category-table th {
        padding: 18px;
        text-align: left;
        font-size: 17px;
    }

    .category-table td {
        padding: 18px;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    .category-table tr:hover {
        background: #f9fafb;
    }

    .action-group {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .detail-button {
        background: #dbeafe;
        color: #1d4ed8;
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .edit-button {
        background: #fef3c7;
        color: #b45309;
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
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
        cursor: pointer;
    }

    .detail-button:hover,
    .edit-button:hover,
    .delete-button:hover {
        opacity: 0.9;
    }

    .empty-text {
        text-align: center;
        color: gray;
        padding: 30px;
    }
</style>

<div class="category-container">

    <div class="category-header">

        <div class="category-title">
            Data Kategori
        </div>

        <a href="{{ route('categories.create') }}"
            class="add-button">

            + Tambah Kategori

        </a>

    </div>

    <div class="category-card">

        <table class="category-table">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th width="260">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($categories as $index => $category)

                <tr>

                    <td>
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $category->name }}
                    </td>

                    <td>
                        {{ $category->description }}
                    </td>

                    <td>

                        <div class="action-group">

                            <a href="{{ route('categories.show', $category->id) }}"
                                class="detail-button">

                                Detail

                            </a>

                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="edit-button">

                                Edit

                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="delete-button">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4"
                        class="empty-text">

                        Data kategori belum ada.

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection