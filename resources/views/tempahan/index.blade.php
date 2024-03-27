@extends('admin.admin')
@section('content')

<div>
    <div class="table-responsive">
        <table class="table data-table table-striped table-hover">
            <thead>
                <tr>
                    <th style="width:5%">#</th>
                    <th>Nama Pengguna</th>
                    <th>Tarikh</th>
                    <th>No Matrik</th>
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
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tempahan.list') }}",
            language: {
                url: "{{ asset('js/datatable-malay.json') }}"
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'namaPengguna', name: 'namaPengguna'},
                {data: 'date', name: 'date'},
                {data: 'noMatrik', name: 'noMatrik'},
                {data: 'noBilik', name: 'noBilik'},
                {data: 'checkin', name: 'checkin'},
                {data: 'checkout', name: 'checkout'}
            ],
            columnDefs: [
                {targets: [0, 1, 2, 3, 4, 5, 6], className: "text-center"},
            ]
        });
    })
</script>
@endpush
