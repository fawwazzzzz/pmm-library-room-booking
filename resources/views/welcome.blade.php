@extends('layouts.app')

@section('content')

@if(session('fail'))
<div class="container">
    <div class="alert alert-danger">{{ session('fail') }}</div>
</div>
@elseif(session('success'))
    <div class="container">
        <div class="alert alert-success d-flex justify-content-between align-items-center">
            {{ session('success') }}
            <a href="/form-result" class="me-3 text-secondary">Lihat <i class="bi bi-chevron-right"></i></a>
        </div>
    </div>
@endif
<div class="container main-page flex-center">
    <div class="row">
        <div class="col-md-6 flex-center">
            <img src="{{ asset('assets/img/img-main.svg') }}" alt="" class="hero-img">
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column hero-desc pe-md-5 mb-5">
            <h2>BookMy Bilik Perbincangan</h2>
            <p class="lead">Perpustakaan Politeknik Merlimau, Kementerian Pengajian Tinggi</p>
            <div class="mb-4 mt-2"></div>
            <a href="/form-available" class="w-100 mt-2">
                <button type="button" class="btn btn-outline-primary w-100">Tempah Bilik</button>
            </a>
        </div>
    </div>
</div>

@endsection