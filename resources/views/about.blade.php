<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <title>About</title>
</head>

<body>
    @include('navbar')
    <div class="title">
        <h1>About</h1>
        <p>Scheduler</p>
    </div>
    <div class="container">
        <p>
            Scheduler adalah aplikasi web yang dirancang untuk membantu Anda dalam mengelola dan mengatur jadwal kegiatan harian secara lebih terstruktur, efisien, dan terintegrasi. Dibuat dengan fokus pada produktivitas dan kenyamanan pengguna, Scheduler mempermudah Anda mencatat berbagai aktivitas, memantau agenda, serta menerima pengingat langsung melalui integrasi dengan Google Calendar.
        </p>
        <br>
        <p>
            Kami memahami bahwa di tengah padatnya aktivitas dan tanggung jawab, mudah sekali melupakan hal-hal penting. Scheduler hadir sebagai solusi digital yang menggabungkan kemudahan pencatatan jadwal dengan kemampuan sinkronisasi lintas perangkat. Dengan antarmuka yang sederhana dan fungsionalitas yang kuat, Scheduler cocok digunakan oleh pelajar, pekerja profesional, hingga tim kerja dalam organisasi.
        </p>
    </div>
    @include('footer')
</body>

</html>