@extends('layouts.app')

@section('content')

<div class="container main-page flex-center">
    <div class="row">
        <div class="col-md-6 flex-center">
            <img src="{{ asset('assets/img/img-main.svg') }}" alt="" class="hero-img">
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-start flex-column hero-desc pe-5">
            <h2>SISTEM TEMPAHAN BILIK PERBINCANGAN PERPUSTAKAAN PMM.</h2>
            <p class="lead mb-5 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="/" class="w-100">
                <button type="button" class="btn btn-outline-primary w-100">Tempah Bilik</button>
            </a>
        </div>
    </div>
</div>

@endsection