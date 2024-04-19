@extends('layouts.app')

@section('content')
    <div class="container">
         @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="flex-start my-4 head">
            <span>Tempahan Berjaya</span>
        </div>

        <h2 style="font-weight: 800" class="mb-4">Bilik & Masa</h2>
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

        <h2 style="font-weight: 800" class="mb-4">Penempah</h2>
        <div class="d-flex justify-content-between align-items-center">
            <p>Nama :</p>
            <p>{{ $data['namaPengguna'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>No Matriks :</p>
            <p>{{ $data['noMatriks'] }}</p>
        </div>
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
            <p>Email :</p>
            <p>{{ $data['email'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Bilangan Dalam Kumpulan :</p>
            <p>{{ $data['groupNum'] }}</p>
        </div>

        <div class="flex-end mt-2">
            <a href="/cancel-reserve/{{ $data['id'] }}" class="w-25">
                <button type="button" class="btn btn-outline-danger w-100">Cancel</button>
            </a>
        </div>
    </div>
@endsection
@push('scripts')
    
@endpush