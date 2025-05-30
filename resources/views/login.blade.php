<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Selamat Datang</title>
</head>

<body>
    <div>
        <h1>Selamat Datang di Aktivitasku</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
        @endif
    </div>
</body>

</html>