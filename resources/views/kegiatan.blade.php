<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan</title>
</head>
<body>
    <h1>Daftar Kegiatan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kegiatans as $kegiatan)
                <tr>
                    <td>{{ $kegiatan->id }}</td>
                    <td>{{ $kegiatan->nama }}</td>
                    <td>{{ $kegiatan->tanggal }}</td>
                    <td>{{ $kegiatan->lokasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $kegiatans->links() }}
</body>
</html>