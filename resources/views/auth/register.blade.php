<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h2>Register Member</h2>

    @if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="/register" method="POST">
        @csrf

        <label>Nama</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Password</label><br>
        <input type="password" name="password"><br><br>

        <label>Konfirmasi Password</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <button type="submit">Register</button>
    </form>

    <p>Sudah punya akun? <a href="/login">Login</a></p>
</body>

</html>