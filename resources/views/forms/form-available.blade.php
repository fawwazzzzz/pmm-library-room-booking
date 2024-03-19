@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-start">
            <a href="/" class="text-decoration-none" style="color: #000000"><i class="bi bi-chevron-left" style="font-size: 36px;"></i></a>
            <h2 class="ms-5">Tempahan Bilik.</h2>
        </div>
        

        <div class="row flex-center time-form">
            <div class="col-md-6 py-3 px-5">
                <form action="#">
                    <label for="">Tarikh</label>
                    <input type="date" id="date-flatpickr" style="width: 100%" class="form-control">

                    <div class="my-3"></div>

                    <label for="">Masa Mula</label>
                    <div class="content flex-center">
                        <div class="column">
                            <select class="hour">
                                <option value="Hour" selected disabled hidden>Hour</option>
                            </select>
                        </div>
                        <div class="column mx-2">
                            <select class="time">
                                <option value="Minute" selected disabled hidden>Minute</option>
                            </select>
                        </div>
                        <div class="column">
                            <select>
                                <option value="AM/PM" selected disabled hidden>AM/PM</option>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="my-3"></div>

                    <label for="">Masa Akhir</label>
                    <div class="content flex-center">
                        <div class="column">
                            <select class="hour">
                                <option value="Hour" selected disabled hidden>Hour</option>
                            </select>
                        </div>
                        <div class="column mx-2">
                            <select class="time">
                                <option value="Minute" selected disabled hidden>Minute</option>
                            </select>
                        </div>
                        <div class="column">
                            <select>
                                <option value="AM/PM" selected disabled hidden>AM/PM</option>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="my-4"></div>

                    <div class="flex-end w-100">
                        <input type="submit" class="btn btn-primary" value="Check Availability">
                    </div>
                </form>
            </div>
            <div class="col-md-6 py-3 px-5">
                <form action="#">
                    <div class="radio-tile-group">

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

                    <div class="flex-end mt-2 w-100">
                        <input type="submit" class="btn btn-primary" value="Next" style="width: 180px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        config = {
            altInput: true,
            altFormat: "F j, Y",
            minDate: "today",
            defaultDate: "today"
        }

        flatpickr("#date-flatpickr", config);

        const selectMenu = document.querySelectorAll('select');

        console.log(selectMenu);

        for (let i = 12; i > 0; i--) {
            i = i < 10 ? "0" + i : i;

            let option = `<option value=${i}>${i}</option>`
            selectMenu[0].firstElementChild.insertAdjacentHTML("afterend", option); 
            selectMenu[3].firstElementChild.insertAdjacentHTML("afterend", option); 
        }

        for (let i = 59; i > 0; i--) {
            i = i < 10 ? "0" + i : i;

            let option = `<option value=${i}>${i}</option>`
            selectMenu[1].firstElementChild.insertAdjacentHTML("afterend", option); 
            selectMenu[4].firstElementChild.insertAdjacentHTML("afterend", option); 
        }

    </script>
@endpush