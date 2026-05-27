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
        max-width: 700px;
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
        width: 140px;
        font-weight: 600;
        color: #374151;
    }

    .detail-separator {
        width: 20px;
    }

    .detail-value {
        color: #111827;
    }

    .back-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: #2563eb;
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-weight: 600;
    }

    .back-button:hover {
        background: #1d4ed8;
    }
</style>

<div class="detail-container">

    <div class="detail-title">
        Detail Buku
    </div>

    <div class="detail-card">

        <div class="detail-item">
            <div class="detail-label">Judul</div>
            <div class="detail-separator">:</div>
            <div class="detail-value">
                {{ $book->title }}
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Author</div>
            <div class="detail-separator">:</div>
            <div class="detail-value">
                {{ $book->author }}
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Kategori</div>
            <div class="detail-separator">:</div>
            <div class="detail-value">
                {{ $book->category->name }}
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Publisher</div>
            <div class="detail-separator">:</div>
            <div class="detail-value">
                {{ $book->publisher }}
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Tahun</div>
            <div class="detail-separator">:</div>
            <div class="detail-value">
                {{ $book->year }}
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Stock</div>
            <div class="detail-separator">:</div>
            <div class="detail-value">
                {{ $book->stock }}
            </div>
        </div>

        <a href="{{ route('books.index') }}"
            class="back-button">
            Kembali
        </a>

    </div>

</div>

@endsection