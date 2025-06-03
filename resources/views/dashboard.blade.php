<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Dashboard</title>
</head>

<body>
    @include('navbar')
    <div class="dashboard-container">
        <div class="welcome">
            <h1>Time</h1>
            <p>is more worth than everything.</p>
            <p>we could help you to manage your activity.</p>
        </div>
    </div>
    <div id='calendar'></div>

    <!-- <h2>Dashboard</h2> -->
    <!-- <p>Selamat datang, {{ Auth::user()->name }}!</p> -->
    <!-- @include('footer') -->
</body>

</html>