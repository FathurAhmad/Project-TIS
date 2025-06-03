<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/kegiatan.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan</title>

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />

    <style>
        .main-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .left-panel {
            flex: 1;
            min-width: 300px;
        }

        .right-panel {
            width: 400px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .card-title {
            font-weight: bold;
            font-size: 18px;
        }

        .card-text {
            margin-top: 5px;
        }

        .card-date {
            font-size: 12px;
            color: gray;
            margin-top: 5px;
        }

        .card-actions {
            margin-top: 10px;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #007bff;
            color: white;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    @include('navbar')

    <h1 style="text-align:center">Daftar Kegiatan</h1>

    <div class="main-container">

        <!-- LEFT: Daftar Kegiatan -->
        <div class="left-panel">
            @foreach ($kegiatans as $item)
            <div class="card">
                <div class="card-title">{{ $item->nama }}</div>
                <div class="card-text">{{ $item->deskripsi }}</div>
                <div class="card-date">{{ $item->tanggal }}</div>
                <div class="card-actions">
                    <a href="{{ route('kegiatans.edit', $item->id) }}">
                        <button class="edit-btn">Edit</button>
                    </a>
                    <form action="{{ route('kegiatans.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn">Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach

            <!-- PAGINATION -->
            <div style="margin-top: 20px;">
                {{ $kegiatans->links() }}
            </div>
        </div>

        <!-- RIGHT: Kalender -->
        <div class="right-panel">
            <h2>Kalender Kegiatan</h2>
            <div id="calendar"></div>
        </div>
    </div>

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            const kegiatan = @json($kegiatans);

            const events = kegiatan.map(item => ({
                title: item.nama,
                start: item.tanggal
            }));

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: events
            });

            calendar.render();
        });
    </script> -->
</body>

</html>
