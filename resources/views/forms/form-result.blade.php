@extends('layouts.app-logo')

@section('content')
    <div class="container">
         @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="flex-start my-4 head d-flex justify-content-between align-items-center">
            <span>Tempahan Berjaya</span>
            <a href="#" class="btn btn-outline-primary">Cetak Tempahan</a>
        </div>

        <h2 style="font-weight: 800" class="mb-4">Bilik & Masa</h2>
        <div class="d-flex justify-content-between align-items-center">
            <p>No Rujukan Tempahan :</p>
            <p>{{ $data['id'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Bilik :</p>
            <p>{{ $data['roomName'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Masa :</p>
            <p>{{ $data['checkin'] }} - {{ $data['checkout'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Tarikh :</p>
            <p>{{ $data['date'] }}</p>
        </div>

        <div class="line-bottom my-4"></div>

        @if ( $data['noMatriks'] == "")
            <h2 style="font-weight: 800" class="mb-4">Staf</h2>
        @else
            <h2 style="font-weight: 800" class="mb-4">Pemohon</h2>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <p>Nama :</p>
            <p>{{ $data['namaPengguna'] }}</p>
        </div>
        @if ($data['noMatriks'] != "")
            <div class="d-flex justify-content-between align-items-center">
                <p>No Matriks :</p>
                <p>{{ $data['noMatriks'] }}</p>
            </div>
        @else
            <div class="d-flex justify-content-between align-items-center">
                <p>No Ic :</p>
                <p>{{ $data['IC'] }}</p>
            </div>
        @endif
        
        {{-- Jabatan --}}
        @isset($data['Jabatan']['namaJabatan'])
            <div class="d-flex justify-content-between align-items-center">
                <p>Jabatan :</p>
                <p>{{ $data['Jabatan']['namaJabatan'] }}</p>
            </div>
        @endisset
        {{-- Program --}}
        @isset($data['Program']['namaProgram'])
            <div class="d-flex justify-content-between align-items-center">
                <p>Program :</p>
                <p>{{ $data['Program']['namaProgram'] }}</p>
            </div>
        @endisset
        <div class="d-flex justify-content-between align-items-center">
            <p>E-mel :</p>
            <p>{{ $data['email'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>No Phone :</p>
            <p>{{ $data['noPhone'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Bilangan Dalam Kumpulan :</p>
            <p>{{ $data['groupNum'] }}</p>
        </div>

        <div class="d-flex justify-content-center align-items-end flex-column mt-2">
            <a href="/cancel-reserve/{{ $data['id'] }}" class="w-25">
                <button type="button" class="btn btn-outline-danger w-100">Batal</button>
            </a>
            <span class="my-2 text-danger">
                <i class="bi bi-info-circle-fill me-1 text-danger"></i> <strong>Batal hanya dibenarkan 30 minit sebelum masa masuk</strong>
            </span>
        </div>
    </div>
@endsection
@push('scripts')
    
@endpush