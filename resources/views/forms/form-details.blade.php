@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-start head">
            <a href="/delete-available/{{ $data['id'] }}" class="text-decoration-none" style="color: #000000"><i class="bi bi-chevron-left" style="font-size: 36px;"></i></a>
            <span class="ms-5">Personal Details</span>
        </div>
        <form action="{{ route('details') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <div class="radio-tile-group mt-4">

                    <div class="input-container">
                        <input id="1" type="radio" name="room">
                        <div class="radio-tile">
                        <label for="A1">A1</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="2" type="radio" name="room">
                        <div class="radio-tile">
                        <label for="A2">A2</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="3" type="radio" name="room">
                        <div class="radio-tile">
                        <label for="A3">A3</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="4" type="radio" name="room">
                        <div class="radio-tile">
                        <label for="B3">B3</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="5" type="radio" name="room">
                        <div class="radio-tile">
                        <label for="Anjung">Anjung</label>
                        </div>
                    </div>
                </div>

            <div class="row mt-5">

                {{-- left side of form --}}
                <div class="col-md-12 px-4">

                    <div class="row">

                        <div class="col-md-8">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>

                        <div class="col-md-4 my-2 my-md-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="matriks" class="form-label">No Matriks</label> 

                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="student" value="student" checked>
                                        <label class="form-check-label" for="student">Student</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="staff" value="staff">
                                        <label class="form-check-label" for="staff">Staff</label>
                                    </div>
                                </div>
                            </div>
                            <input type="text" name="matriks" class="form-control" id="matriks">
                        </div>

                        <div class="my-md-2 my-0"></div>

                        <div class="col-md-6 my-2 my-md-0">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-10">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <select class="form-select" aria-label="Jabatan" id="jabatan" name="jabatanName">
                                        <option selected disabled hidden>Select ..</option>
                                        <option value="JP">Jabatan Perdagangan</option>
                                        <option value="JPH">JPH</option>
                                        <option value="JKM">Jabatan Kejuruteraan Mekanikal</option>
                                        <option value="JKA">Jabatan Kejuruteraan Awan</option>
                                        <option value="JKE">Jabatan Kejuruteraan Elektrik</option>
                                        <option value="TVET">TVET</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select class="form-select" aria-label="semester" id="semester" name="semesterName">
                                        <option selected disabled hidden></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-1"></div>

                        <div class="my-2"></div>

                        <div class="col-md-8">
                            <label for="purpose" class="form-label">Purpose</label>
                            <input type="text" name="purposeName" class="form-control" id="purpose">
                        </div>

                        <div class="col-md-4">
                            <label for="groupnum" class="form-label">Number Of Group Members</label>
                            <input type="text" name="groupnum" class="form-control" id="groupnum" onkeydown="allowOnlyNumbers(event)">
                        </div>
                        
                        
                    </div>
                </div>

                {{-- right side of form --}}
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

        for (let i = 1; i <= 5; i++) {
            
            if (i == {{ $data['roomID'] }}) {
                document.getElementById(`${i}`).checked = true;
                continue;
            }
            
            document.getElementById(`${i}`).disabled = true;
        }

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        // Student and Staff radio button function

        let studentRadio = document.getElementById('student');
        let staffRadio = document.getElementById('staff');
        let matriksText = document.getElementById('matriks');

        $('#student').on('change', function () {     
            if (studentRadio.checked) {

                matriksText.readOnly = false;
                matriksText.value = '';
                matriksText.placeholder = 'Enter Student ID';
            }
        })

        $('#staff').on('change', function () {

            if (staffRadio.checked) {
                
                matriksText.disabled = false;
                matriksText.readOnly = true;
                matriksText.value = 'Staff';
            }

        })




    </script>
@endpush