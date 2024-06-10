<!DOCTYPE html>
<html lang="en">
<head>
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th {
            padding: 10px 0px;

            text-align: center;
            font-size: 14px;
        }

        td {
            padding: 10px 5px;
            font-size: 12px;
        }

        .date {
            text-align: center;
            width: 60px;
        }
    </style>
</head>
<body>
    <h2>{{ $title }}</h2>
    <h4>{{ $date }}</h4>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pengguna</th>
                <th>Tarikh</th>
                <th>Jabatan</th>
                <th>Bilik</th>
                <th>(checkin)</th>
                <th>(checkout)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $data)
                <tr>
                    <td style="text-align: center">{{ $data['id'] }}</td>
                    <td style="width: 220px">{{ $data['namaPengguna'] }}</td>
                    <td class="date">{{ $data['date'] }}</td>
                    <td>{{ $data['namaJabatan'] }}</td>
                    <td>{{ $data['roomName'] }}</td>
                    <td>{{ $data['checkin'] }}</td>
                    <td>{{ $data['checkout'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>