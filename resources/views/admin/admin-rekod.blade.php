@extends('admin.admin')
@section('content')

    <div class="w-100 d-flex justify-content-end">
        <i class="bi bi-list toggle-sidebar-btn d-block d-xl-none"></i>
    </div>

    <span class="head-rekod">Pelajar</span>

    <div class="mt-4">
        <div class="table-responsive">
            <table class="table data-table-pelajar table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width:5%">#</th>
                        <th>Nama Pengguna</th>
                        <th>Tarikh</th>
                        <th>Program</th>
                        <th>No Matrik</th>
                        <th>No Bilik</th>
                        <th>(checkin)</th>
                        <th>(checkout)</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="my-5 line-bottom"></div>

    <span class="head-rekod">Pensyarah</span>

    <div class="mt-4">
        <div class="table-responsive">
            <table class="table data-table-pensyarah table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width:5%">#</th>
                        <th>Nama Pengguna</th>
                        <th>Tarikh</th>
                        <th>Jabatan</th>
                        <th>No Bilik</th>
                        <th>(checkin)</th>
                        <th>(checkout)</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
@push('scripts')
    
<script>
    $(function () {
        var tablePelajar = $('.data-table-pelajar').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tempahan.pelajar-list') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'namaPengguna', name: 'namaPengguna' },
                { data: 'tarikh', name: 'tarikh' },
                { data: 'program', name: 'program' },
                { data: 'noMatrik', name: 'noMatrik' },
                { data: 'noBilik', name: 'noBilik' },
                { data: 'checkin', name: 'checkin' },
                { data: 'checkout', name: 'checkout' }
            ],
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, 5, 6, 7], className: "text-start" },
            ]
        });
        var tablePensyarah = $('.data-table-pensyarah').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tempahan.pensyarah-list') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'namaPengguna', name: 'namaPengguna' },
                { data: 'tarikh', name: 'tarikh' },
                { data: 'jabatan', name: 'jabatan' },
                { data: 'noBilik', name: 'noBilik' },
                { data: 'checkin', name: 'checkin' },
                { data: 'checkout', name: 'checkout' }
            ],
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, 5, 6], className: "text-start" },
            ]
        })

    })
</script>
@endpush
