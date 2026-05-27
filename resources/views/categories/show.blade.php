@extends('layouts.app')

@section('content')

<style>
    .detail-container {
        padding: 40px;
    }

    .detail-title {
        font-size: 55px;
        font-weight: bold;
        margin-bottom: 35px;
    }

    .detail-card {
        background: white;
        max-width: 800px;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .detail-item {
        display: flex;
        margin-bottom: 20px;
        font-size: 20px;
    }

    .detail-label {
        width: 170px;
        font-weight: 600;
    }

    .detail-separator {
        width: 20px;
    }

    .book-list {
        margin-top: 35px;
    }

    .book-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .book-item {
        background: #f9fafb;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 12px;
    }

    .back-button {
        display: inline-block;
        margin-top: 30px;
        background: #2563eb;
        color: white;
        padding: 12px 22px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
    }
</style>

<div class="detail-container">

    <div class="detail-title">
        Detail Kategori
    </div>

    <div class="detail-card">

        <div class="detail-item">
            <div class="detail-label">Nama Kategori</div>
            <div class="detail-separator">:</div>
            <div>{{ $category->name }}</div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Deskripsi</div>
            <div class="detail-separator">:</div>
            <div>{{ $category->description }}</div>
        </div>

        <div class="book-list">

            <div class="book-title">
                Daftar Buku
            </div>

            @forelse($category->books as $book)

            <div class="book-item">
                {{ $book->title }}
            </div>

            @empty

            <div class="book-item">
                Belum ada buku.
            </div>

            @endforelse

        </div>

        <a href="{{ route('categories.index') }}"
            class="back-button">

            Kembali

        </a>

    </div>

</div>

@endsection