@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-start head">
            <a href="/delete-available/{{ $data['id'] }}" class="text-decoration-none" style="color: #000000"><i class="bi bi-chevron-left" style="font-size: 36px;"></i></a>
            <span class="ms-5">Maklumat Penempah</span>
        </div>
        <form action="{{ route('details') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <div class="radio-tile-group mt-4">

                    <div class="input-container">
                        <input id="1" type="radio" name="room" value="A1">
                        <div class="radio-tile">
                        <label for="A1">A1</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="2" type="radio" name="room" value="A2">
                        <div class="radio-tile">
                        <label for="A2">A2</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="3" type="radio" name="room" value="A3">
                        <div class="radio-tile">
                        <label for="A3">A3</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="4" type="radio" name="room" value="B3">
                        <div class="radio-tile">
                        <label for="B3">B3</label>
                        </div>
                    </div>

                    <div class="input-container">
                        <input id="5" type="radio" name="room" value="Anjung">
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
                            <label for="name" class="form-label">Nama Penuh</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <input type="text" name="matriks" class="form-control @error('matriks') is-invalid @enderror" id="matriks" placeholder="Masukkan No Matriks" value="{{ old('matriks') }}">
                            @error('matriks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="my-md-2 my-0"></div>

                        <div class="col-md-6 my-2 my-md-0">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-9">
                                    <div id="program-jabatan"></div>
                                    {{-- <label for="jabatan" class="form-label">Jabatan</label>
                                    <select class="form-select" aria-label="Jabatan" id="jabatan" name="jabatanName">
                                        <option selected disabled hidden>Select ..</option>
                                        <option value="JP">Jabatan Perdagangan</option>
                                        <option value="JPH">JPH</option>
                                        <option value="JKM">Jabatan Kejuruteraan Mekanikal</option>
                                        <option value="JKA">Jabatan Kejuruteraan Awan</option>
                                        <option value="JKE">Jabatan Kejuruteraan Elektrik</option>
                                        <option value="TVET">TVET</option>
                                    </select> --}}
                                </div>
                                <div class="col-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select class="form-select @error('semesterName') is-invalid @enderror" aria-label="semester" id="semester" name="semesterName" val>
                                        <option selected disabled hidden></option>
                                        <option value="1" {{ old('semesterName') == '1' ? 'selected' : '' }} >1</option>
                                        <option value="2" {{ old('semesterName') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('semesterName') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('semesterName') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('semesterName') == '5' ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ old('semesterName') == '6' ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ old('semesterName') == '7' ? 'selected' : '' }}>7</option>
                                    </select>
                                    @error('semesterName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-1"></div>

                        <div class="my-2"></div>

                        <div class="col-md-8">
                            <label for="purpose" class="form-label">Tujuan</label>
                            <input type="text" name="purposeName" class="form-control @error('purposeName') is-invalid @enderror" id="purpose" value="{{ old('purposeName') }}" placeholder="Nyatakan Tujuan">
                            @error('purposeName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="groupnum" class="form-label">Bilangan Dalam Kumpulan</label>
                            <input type="text" name="groupnum" class="form-control @error('groupnum') is-invalid @enderror" id="groupnum" onkeydown="allowOnlyNumbers(event)" value="{{ old('groupnum') }}">
                            @error('groupnum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

        switchProgram();

        $('#student').on('change', function () {     
            switchProgram();
        })

        $('#staff').on('change', function () {

            if (staffRadio.checked) {
                
                matriksText.disabled = false;
                matriksText.readOnly = true;
                matriksText.value = 'Staff';

                let jabatanArray = {{ Illuminate\Support\Js::from($jabatan) }};

                console.log(jabatanArray);

                let jabatanDrop = "<label for=\"jabatan\" class=\"form-label\">Jabatan</label>\
                                    <select class=\"form-select @error('jabatanID') is-invalid @enderror\" aria-label=\"Jabatan\" id=\"jabatan\" name=\"jabatanID\"> \
                                        <option selected disabled hidden>Select ..</option> \
                                        @error('jabatanID') \
                                            <span class=\"invalid-feedback\" role=\"alert\"> \
                                                <strong>{{ $message }}</strong> \
                                            </span> \
                                        @enderror"

                jabatanArray.forEach(item => {
                    jabatanDrop += "<option value=\"" + item.idJabatan + "\" {{ old('jabatanID') == " + item.idJabatan + "  ? 'selected' : '' }} >" + item.namaJabatan + "</option>";
                });

                jabatanDrop += "</select>"

                document.getElementById('program-jabatan').innerHTML = jabatanDrop;
            }

        })

        function switchProgram() {
            if (studentRadio.checked) {

                matriksText.readOnly = false;
                matriksText.value = '';
                matriksText.placeholder = 'Masukkan No Matriks';

                let programArray = {{ Illuminate\Support\Js::from($program) }};

                let programDrop = "<label for=\"Program\" class=\"form-label\">Program</label>\
                                    <select class=\"form-select @error('programID') is-invalid @enderror\" aria-label=\"Program\" id=\"program\" name=\"programID\"> \
                                        <option selected disabled hidden>Select ..</option> \
                                        @error('programID') \
                                            <span class=\"invalid-feedback\" role=\"alert\"> \
                                                <strong>{{ $message }}</strong> \
                                            </span> \
                                        @enderror"

                programArray.forEach(item => {
                    programDrop += "<option value=\"" + item.idProgram + "\" {{ old('programID') == " + item.idProgram + "  ? 'selected' : '' }} >" + item.namaProgram + "</option>";
                });

                programDrop += "</select>"

                document.getElementById('program-jabatan').innerHTML = programDrop;

            }
        }

    </script>
@endpush