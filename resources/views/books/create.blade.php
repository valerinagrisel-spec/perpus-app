@extends('layouts.app')

@section('content')

<style>
    .create-container {
        padding: 40px;
    }

    .create-title {
        font-size: 55px;
        font-weight: bold;
        margin-bottom: 35px;
    }

    .create-card {
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

    .save-button {
        background: #2563eb;
        color: white;
        border: none;
        padding: 12px 22px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
    }

    .save-button:hover {
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

<div class="create-container">

    <div class="create-title">
        Tambah Buku
    </div>

    <div class="create-card">

        <form action="{{ route('books.store') }}"
            method="POST">

            @csrf

            <div class="form-group">

                <label class="form-label">
                    Kategori
                </label>

                <select name="category_id"
                    class="form-input">

                    @foreach($categories as $category)

                    <option value="{{ $category->id }}">
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
                    class="form-input">

            </div>

            <div class="form-group">

                <label class="form-label">
                    Author
                </label>

                <input type="text"
                    name="author"
                    class="form-input">

            </div>

            <div class="form-group">

                <label class="form-label">
                    Publisher
                </label>

                <input type="text"
                    name="publisher"
                    class="form-input">

            </div>

            <div class="form-group">

                <label class="form-label">
                    Year
                </label>

                <input type="number"
                    name="year"
                    class="form-input">

            </div>

            <div class="form-group">

                <label class="form-label">
                    Stock
                </label>

                <input type="number"
                    name="stock"
                    class="form-input">

            </div>

            <div class="button-group">

                <button type="submit"
                    class="save-button">

                    Simpan

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