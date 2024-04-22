@extends('layouts.app-logo')

@section('content')
    <div class="container">
        <div class="head d-flex justify-content-md-center justify-content-xxl-start align-items-center">
            <a href="/" class="text-decoration-none" style="color: #000000"><i class="bi bi-chevron-left" style="font-size: 36px;"></i></a>
            <span class="ms-4">Tempahan Bilik</span>
        </div>
        

        <div class="row flex-center time-form">
            <div class="col-md-6 py-3 px-5">
                <form action="{{ route('time') }}" method="POST">
                    @csrf
                    <label for="">Tarikh</label>
                    <input type="date" id="date-flatpickr" name="date" style="width: 100%" class="form-control" required>

                    <div class="my-3"></div>

                    <label for="">Masa Mula</label>
                    <div class="content flex-center">
                        <div class="column">
                            <select class="hour" name="sHour" required>
                                <option value="Hour" selected disabled hidden>Jam</option>
                            </select>
                        </div>
                        <div class="column ms-2">
                            <select class="time" name="sMinute" required>
                                <option value="Minute" selected disabled hidden>Minit</option>
                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                        {{-- <div class="column">
                            <select name="startAMPM" required>
                                <option value="AM/PM" selected disabled hidden>AM/PM</option>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div> --}}
                    </div>

                    <div class="my-3"></div>

                    <label for="">Masa Akhir</label>
                    <div class="content flex-center">
                        <div class="column">
                            <select class="hour" name="eHour" required>
                                <option value="Hour" selected disabled hidden>Jam</option>
                            </select>
                        </div>
                        <div class="column ms-2">
                            <select class="time" name="eMinute" required>
                                <option value="Minute" selected disabled hidden>Minit</option>
                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                        {{-- <div class="column">
                            <select name="endAMPM" required>
                                <option value="AM/PM" selected disabled hidden>AM/PM</option>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div> --}}
                    </div>

                    <div class="my-4"></div>

                    <div class="flex-end w-100">
                        <input id="checkAvailabilityButton" type="button" class="btn btn-primary btn-availability" value="Check Availability">
                    </div>

                </div>
                <div class="col-md-6 py-3 px-5">
                    <div class="radio-tile-group">

                        <div class="input-container">
                            <input id="1" value="1" type="radio" name="room" required disabled>
                            <div class="radio-tile">
                            <label for="1">A1</label>
                            </div>
                        </div>

                        <div class="input-container">
                            <input id="2" value="2" type="radio" name="room" required disabled>
                            <div class="radio-tile">
                            <label for="2">A2</label>   
                            </div>
                        </div>

                        <div class="input-container">
                            <input id="3" value="3" type="radio" name="room" required disabled>
                            <div class="radio-tile">
                            <label for="3">A3</label>
                            </div>
                        </div>

                        <div class="input-container">
                            <input id="4" value="4" type="radio" name="room" required disabled>
                            <div class="radio-tile">
                            <label for="4">B3</label>
                            </div>
                        </div>

                        <div class="input-container">
                            <input id="5" value="5" type="radio" name="room" required disabled>
                            <div class="radio-tile">
                            <label for="5">Anjung</label>
                            </div>
                        </div>
                    </div>

                    <div class="flex-end mt-2 w-100">
                        <input type="submit" class="btn btn-primary btn-availability" value="Next" id="submitRoom" disabled>
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

        for (let i = 17; i > 8; i--) {
            i = i < 10 ? "0" + i : i;

            if (i === 6 || i === 7 || i === 8) {
                continue;
            }

            let option = `<option value=${i}>${i}</option>`
            selectMenu[0].firstElementChild.insertAdjacentHTML("afterend", option); 
            selectMenu[2].firstElementChild.insertAdjacentHTML("afterend", option); 
        }
        
        $('#checkAvailabilityButton').on('click', function () {

            // If any required field is empty, display an error message
            if (!validationTime()) {
                alert('Tolong isi ruang yang kosong.')
                return;
            }

            // Check in section

            // Set into 24 hours format
            let hourStart = parseInt(selectMenu[0].value); 
            
            // if (selectMenu[2].value == "PM") {

            //     hourStart += 12;

            //     if (hourStart == 24 ) 
            //     {
            //         hourStart = 12;
            //     }
            // } 
            // else if (selectMenu[2].value == "AM" && hourStart == 12) {
            //     hourStart -= 12
            //     hourStart = hourStart + "0";
            // }

            const startTime = `${hourStart}:${selectMenu[1].value}:00`;
            console.log(startTime);

            // Check out section

            // Set into 24 hours format
            let hourEnd = parseInt(selectMenu[2].value); 
            
            // if (selectMenu[5].value == "PM") {

            //     hourEnd += 12;

            //     if (hourEnd == 24 ) 
            //     {
            //         hourEnd = 12;
            //     }
            // } 
            // else if (selectMenu[2].value == "AM" && hourEnd == 12) {
            //     hourEnd -= 12
            //     hourEnd = hourEnd + "0";
            // }

            const endTime = `${hourEnd}:${selectMenu[3].value}:00`;
            console.log(endTime);

            let between = countBetween(hourStart, hourEnd);

            let date = document.getElementById('date-flatpickr').value;
            console.log(date);

            // Ajax send data to Controller
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            $.ajax({
                url: '/process-data',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                },
                data: {
                    date: date,
                    checkin: startTime,
                    checkout: endTime
                },
                success: function(response) {                    
                    // Access the JSON array data
                    const testData = response.test;
                    document.getElementById('submitRoom').disabled = false;

                    unDisabledButton();   

                    // Process the data as needed
                    testData.forEach(item => {
                        // Access each item in the JSON array and do something with it
                        console.log(item.roomID);
                        
                        document.getElementById(`${item.roomID}`).disabled = true;
                    });
                },
                error: function(xhr, status, error) {

                    $("input[name=room]").attr("disabled", true);
                    $("#submitRoom").attr("disabled", true);
                    
                    alert(xhr.responseJSON.checkout[0])

                }
            });
        })

        function validationTime() {
            
            var dateInput = document.getElementById('date-flatpickr');
            var sHourSelect = document.querySelector('select[name="sHour"]');
            var sMinuteSelect = document.querySelector('select[name="sMinute"]');
            var eHourSelect = document.querySelector('select[name="eHour"]');
            var eMinuteSelect = document.querySelector('select[name="eMinute"]');

            var isValid = true;

            // Check if any required field is empty
            if (dateInput.value === '') {
                return isValid = false;
            }
            if (sHourSelect.value === 'Hour' || sMinuteSelect.value === 'Minute') {
                return isValid = false;
            }
            if (eHourSelect.value === 'Hour' || eMinuteSelect.value === 'Minute') {
                return isValid = false;
            }

            return isValid = true;
        }

        function unDisabledButton() {

            for (let i = 0; i < 5; i++) {     
                document.getElementById(`${i+1}`).disabled = false;    
            }
        }

        function countBetween(start, end) {

            let start12pm = start == 12 ? 24 : start;

            let between = start - end;
            return between;
        }

    </script>
@endpush