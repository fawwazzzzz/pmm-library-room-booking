@extends('layouts.app')

@section('content')

<div class="container main-page flex-center">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-md-6 flex-center">
            <img src="{{ asset('assets/img/img-main.svg') }}" alt="" class="hero-img">
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-start flex-column hero-desc pe-md-5 mb-5">
            <h2>SISTEM TEMPAHAN BILIK PERBINCANGAN PERPUSTAKAAN <br> AL-KHAWARIZMI.</h2>
            <div class="mb-4 mt-2"></div>
            <a href="/form-available" class="w-100 mt-2">
                <button type="button" class="btn btn-outline-primary w-100">Tempah Bilik</button>
            </a>
        </div>
    </div>
</div>

@endsection