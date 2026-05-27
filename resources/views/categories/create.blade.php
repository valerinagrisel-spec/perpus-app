@extends('layouts.app')

@section('content')

<div id="form-container" data-role="{{ auth()->user()->role ?? 'member' }}">

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
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 16px;
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
        }

        .cancel-button {
            background: #e5e7eb;
            color: #374151;
            padding: 12px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }
    </style>

    <div class="create-container">

        <div class="create-title">
            Tambah Kategori
        </div>

        <div class="create-card">

            @if($errors->any())

            <ul style="color:red; margin-bottom:20px;">

                @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

            @endif

            <form action="{{ route('categories.store') }}"
                method="POST">

                @csrf

                <div class="form-group">

                    <label class="form-label">
                        Nama Kategori
                    </label>

                    <input type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-input">

                </div>

                <div class="form-group">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="description"
                        rows="5"
                        class="form-input">{{ old('description') }}</textarea>

                </div>

                <div class="button-group">

                    <button type="submit"
                        class="save-button">

                        Simpan

                    </button>

                    <a href="{{ route('categories.index') }}"
                        class="cancel-button">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const formContainer =
            document.getElementById("form-container");

        const userRole =
            formContainer.getAttribute("data-role");

        if (userRole === "member") {

            formContainer.innerHTML = `
            <div style="
                text-align:center;
                margin-top:50px;
                padding:30px;
                background:white;
                border-radius:20px;
                box-shadow:0 5px 15px rgba(0,0,0,0.1);
            ">

                <h2 style="color:red;">
                    🛑 403 - Akses Ditolak
                </h2>

                <p style="margin:20px 0;">
                    Member tidak diperbolehkan
                    mengakses form kategori.
                </p>

                <a href="{{ route('categories.index') }}"
                   style="
                    background:#2563eb;
                    color:white;
                    padding:10px 18px;
                    border-radius:10px;
                    text-decoration:none;
                   ">

                    Kembali

                </a>

            </div>
        `;
        }
    });
</script>

@endsection