@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-start">
            <a href="/form-available" class="text-decoration-none" style="color: #000000"><i class="bi bi-chevron-left" style="font-size: 36px;"></i></a>
            <h2 class="ms-5">Personal Details</h2>
        </div>
        <form action="#">
            <div class="radio-tile-group mt-4">

                    <div class="input-container">
                        <input id="walk" type="radio" name="radio">
                        <div class="radio-tile">
                        <label for="A1">A1</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="bike" type="radio" name="radio">
                        <div class="radio-tile">
                        <label for="A2">A2</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="car" type="radio" name="radio">
                        <div class="radio-tile">
                        <label for="A3">A3</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="fly" type="radio" name="radio">
                        <div class="radio-tile">
                        <label for="B3">B3</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="fly" type="radio" name="radio">
                        <div class="radio-tile">
                        <label for="Anjung">Anjung</label>
                        </div>
                    </div>
                </div>

            <div class="row mt-5">

                {{-- left side of form --}}
                <div class="col-md-6 px-4">

                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name">

                    <div class="my-2">
                        <label for="matriks" class="form-label">No Matriks</label>
                        <input type="text" name="matriks" class="form-control" id="matriks">
                    </div>

                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select class="form-select" aria-label="Jabatan" id="jabatan">
                        <option selected disabled hidden>Select ..</option>
                        <option value="Jabatan Perdagangan">Jabatan Perdagangan</option>
                        <option value="Jabatan Teknologi Maklumat & Komunikasi">Jabatan Teknologi Maklumat & Komunikasi</option>
                        <option value="Jabatan Mekanikal">Jabatan Mekanikal</option>
                    </select>

                </div>

                {{-- right side of form --}}
                <div class="col-md-6 px-4">

                    <label for="nophone" class="form-label">No Phone</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="addon-nophone">+60</span>
                        <input type="text" name="nophone" class="form-control" id="nophone" onkeydown="allowOnlyNumbers(event)" aria-describedby="addon-nophone">
                    </div>

                    <div class="my-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <label for="groupnum" class="form-label">Group Number</label>
                        {{-- <button class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="This top tooltip is themed via CSS variables."><i class="bi bi-info"></i></button> --}}
                        {{-- <button type="button" class="btn btn-secondary"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables.">
                        Custom tooltip
                        </button> --}}
                    </div>
                    <input type="text" name="groupnum" class="form-control" id="groupnum" onkeydown="allowOnlyNumbers(event)">
                </div>
                <div class="flex-end mt-3 pe-md-4 w-100">
                    <input type="submit" class="btn btn-primary" value="Submit" style="width: 180px;">
                </div>
            </div>
        </form>
    </div>    
@endsection
@push('scripts')
    <script>
        // Function to allow only numbers in the input field and limit to around 10 characters
    function allowOnlyNumbers(event) {
        // Allow: backspace, delete, tab, escape, enter, and '.' (for decimals)
        if ([46, 8, 9, 27, 13, 110, 190].indexOf(event.keyCode) !== -1 ||
            // Allow: Ctrl+A/Ctrl+C/Ctrl+V
            (event.keyCode === 65 && (event.ctrlKey === true || event.metaKey === true)) || // Ctrl+A
            (event.keyCode === 67 && (event.ctrlKey === true || event.metaKey === true)) || // Ctrl+C
            (event.keyCode === 86 && (event.ctrlKey === true || event.metaKey === true)) || // Ctrl+V
            // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            // Let it happen, don't do anything
            return;
        }

        // Limit to around 10 characters
        if (event.target.value.length >= 11) {
            event.preventDefault();
        }

        // Ensure that it is a number and stop the keypress
        if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
            event.preventDefault();
        }
    }

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endpush