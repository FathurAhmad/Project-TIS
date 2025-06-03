<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="login-container">
        <form method="POST" action="/login">
            @csrf
                <label>Email</label><br>
                <input type="email" name="email" value="{{ old('email') }}">
                <label>Password</label><br>
                <input type="password" name="password">
                <button type="submit">Login</button>
            
        </form>
    </div>
</body>
</html>
