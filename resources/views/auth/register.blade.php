<!DOCTYPE html>
<html>

<head>
    <title>Register</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: linear-gradient(135deg, #2563eb, #1e3a8a);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            width: 400px;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: gray;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .link {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }
    </style>

</head>

<body>

    <div class="card">

        <h1>Register</h1>

        <p>Daftar dan mulai menjelajahi koleksi buku</p>

        @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form action="/register" method="POST">
            @csrf

            <label>Nama</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama">

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email">

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan password">

            <label>Konfirmasi Password</label>

            <input
                type="password"
                name="password_confirmation"
                placeholder="Konfirmasi password">

            <button type="submit">
                Register
            </button>

        </form>

        <div class="link">
            Sudah punya akun?
            <a href="/login">Login</a>
        </div>

    </div>

</body>

</html>