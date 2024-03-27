@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-start my-4 head">
            <a href="/form-details" class="text-decoration-none" style="color: #000000"><i class="bi bi-chevron-left" style="font-size: 36px;"></i></a>
            <span class="ms-5">Reservation Successful</span>
        </div>

        <h2 style="font-weight: 800" class="mb-4">Room & Time</h2>
        <div class="d-flex justify-content-between align-items-center">
            <p>ID No :</p>
            <p>{{ $data['id'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Room :</p>
            <p>{{ $data['roomID'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Time :</p>
            <p>{{ $data['checkin'] }} - {{ $data['checkout'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Date :</p>
            <p>{{ $data['date'] }}</p>
        </div>

        <div class="line-bottom my-4"></div>

        <h2 style="font-weight: 800" class="mb-4">Participant</h2>
        <div class="d-flex justify-content-between align-items-center">
            <p>Nama :</p>
            <p>{{ $data['namaPengguna'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>No Matriks :</p>
            <p>{{ $data['noMatriks'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Jabatan :</p>
            <p>{{ $data['Jabatan'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Email :</p>
            <p>{{ $data['email'] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p>Group Number :</p>
            <p>{{ $data['groupNum'] }}</p>
        </div>
    </div>
@endsection
@push('scripts')
    
@endpush