<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            src: url('{{ public_path('fonts/Poppins-Regular.ttf') }}') format('truetype');
        }

        body {
            font-family: "Poppins", sans-serif;
            font-style: normal;
        }

        .section {
            overflow: auto;
        }

        .left, .right {
            padding: 10px;
        }
        .left {
            float: left;
            width: 50%;
        }
        .right {
            float: right;
            width: 50%;
        }
        .line-bottom {
            border-bottom: 2px solid #000;
        }

        .mb-4 {
            margin-left: 50px;
        }
    </style>
</head>
<body>

    <div class="container">

        {{-- <img src="{{ asset('assets/img/Politeknik Merlimau PNG.png') }}" style="width: 100px"> --}}
        
        <span style="font-size: 40px; font-weight: 800">{{ $title }}</span>

        <div class="section">
            <h2 style="font-weight: 800;" >Bilik & Masa</h2>
            <div class="left">
                <p>No Rujukan Tempahan :</p>
                <p>Bilik :</p>
                <p>Masa :</p>
                <p>Tarikh :</p>
            </div>
            <div class="right">
                <p>{{ $detail['id'] }}</p>
                <p>{{ $detail['roomName'] }}</p>
                <p>{{ $detail['checkin'] }} - {{ $detail['checkout'] }}</p>
                <p>{{ $detail['date'] }}</p>
            </div>
            <div class="line-bottom" style="width: 100%"></div>
        </div>    

        <div class="section">
            @if ( $detail['noMatriks'] == "")
                <h2 style="font-weight: 800">Staf</h2>
            @else
                <h2 style="font-weight: 800">Pemohon</h2>
            @endif
            <div class="line-bottom" style="width: 100%"></div>
            <div class="left">
                <p>Nama :</p>
                @if ($detail['noMatriks'] != "")
                    <p>No Matriks :</p>            
                @else
                    <p>No Ic :</p>
                @endif
                @isset($detail['Jabatan']['namaJabatan'])
                <p>Jabatan :</p>
                @endisset
                @isset($detail['Program']['namaProgram'])
                <p>Program :</p>
                @endisset
                <p>E-mel :</p>
                <p>No Phone :</p>
                <p>Bilangan Dalam Kumpulan :</p>
            </div>
            <div class="right">
                <p>{{ $detail['namaPengguna'] }}</p>
                @if ($detail['noMatriks'] != "")
                    <p>{{ $detail['noMatriks'] }}</p>
                @else
                    <p>{{ $detail['IC'] }}</p>
                @endif
                @isset($detail['Jabatan']['namaJabatan'])
                    <p>{{ $detail['Jabatan']['namaJabatan'] }}</p>
                @endisset
                @isset($detail['Program']['namaProgram'])
                <p>{{ $detail['Program']['namaProgram'] }}</p>
                @endisset
                <p>{{ $detail['email'] }}</p>
                <p>{{ $detail['noPhone'] }}</p>
                <p>{{ $detail['groupNum'] }}</p>
            </div>
        </div>
    </div>
</body>
</html>