<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>

<body>
  <nav>
    <div class="nav-left">
      <a href="{{ url('/') }}">
        <i class="fas fa-calendar-alt"></i> Scheduler
      </a>
    </div>
    <div class="nav-center">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('home') }}">My Schedule</a>
      <a href="{{ route('about') }}">About</a>
    </div>
    <div class="nav-right">
      @auth
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
      </form>
      @endauth
    </div>
  </nav>
</body>

<!-- <div class="navbar">
        <div class="navbar-content">
            <div class="navbar-brand">
                <i class="fas fa-calendar-alt"></i> Scheduler
            </div>
            <ul class="navbar-nav">
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#schedule">My Schedule</a></li>
                <li><a href="#about">About</a></li>
            </ul>
            <button class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </div>
    </div> -->

</html>