<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>

<body>
  <nav>
    <div class="nav-left">
      <a href="{{ url('/') }}">MyApp</a>
    </div>
    <div class="nav-center">
      <a href="{{ url('/kegiatan') }}">My Schedule</a>
      <a href="{{ url('/dashboard') }}">Dashboard</a>
      <a href="{{ url('/about') }}">About</a>
    </div>
    <div class="nav-right">
      @auth
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
      </form>
      @else
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
      @endauth
    </div>
  </nav>
</body>

</html>