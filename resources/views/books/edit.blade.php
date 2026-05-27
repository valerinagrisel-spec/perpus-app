@extends('layouts.app')

@section('content')

<style>
    .edit-container {
        padding: 40px;
    }

    .edit-title {
        font-size: 55px;
        font-weight: bold;
        margin-bottom: 35px;
    }

    .edit-card {
        background: white;
        max-width: 700px;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #374151;
    }

    .form-input {
        width: 100%;
        padding: 12px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 16px;
        transition: 0.3s;
    }

    .form-input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
    }

    .button-group {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .update-button {
        background: #2563eb;
        color: white;
        border: none;
        padding: 12px 22px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
    }

    .update-button:hover {
        background: #1d4ed8;
    }

    .cancel-button {
        background: #e5e7eb;
        color: #374151;
        padding: 12px 22px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
    }

    .cancel-button:hover {
        background: #d1d5db;
    }
</style>

<div class="edit-container">

    <div class="edit-title">
        Edit Buku
    </div>

    <div class="edit-card">

        <form action="{{ route('books.update', $book->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label class="form-label">
                    Kategori
                </label>

                <select name="category_id"
                    class="form-input">

                    @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                        {{ $book->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label class="form-label">
                    Judul
                </label>

                <input type="text"
                    name="title"
                    value="{{ $book->title }}"
                    class="form-input">

            </div>

            <div class="form-group">

                <label class="form-label">
                    Penulis
                </label>

                <input type="text"
                    name="author"
                    value="{{ $book->author }}"
                    class="form-input">

            </div>

            <div class="form-group">

                <label class="form-label">
                    Penerbit
                </label>

                <input type="text"
                    name="publisher"
                    value="{{ $book->publisher }}"
                    class="form-input">

            </div>

            <div class="form-group">

                <label class="form-label">
                    Tahun
                </label>

                <input type="number"
                    name="year"
                    value="{{ $book->year }}"
                    class="form-input">

            </div>

            <div class="form-group">

                <label class="form-label">
                    Stok
                </label>

                <input type="number"
                    name="stock"
                    value="{{ $book->stock }}"
                    class="form-input">

            </div>

            <div class="button-group">

                <button type="submit"
                    class="update-button">

                    Update Buku

                </button>

                <a href="{{ route('books.index') }}"
                    class="cancel-button">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection