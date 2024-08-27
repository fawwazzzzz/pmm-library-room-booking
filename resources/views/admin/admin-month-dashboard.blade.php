@extends('admin.admin')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/laporan-bulanan">Laporan Bulanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $month }}</li>
        </ol>
    </nav>
    
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <h2>{{ $month }}</h2>
        <i class="bi bi-list toggle-sidebar-btn d-block d-xl-none"></i>
    </div>
          <!-- End Page Title -->

          <section class="section dashboard">
                <div class="row">

                  <!-- Left side columns -->
                  <div class="col-lg-12">
                        <div class="row">
                            <!-- Total Tempahan Card -->
                            <div class="col-md-6 pb-4">
                                <div class="card info-card h-100 customers-card">
                                    <div class="card-body flex-center">
                                        <div class="row">
                                            <div class="col-4 flex-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-door-closed"></i>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <h5 class="card-title">Tempahan <span>| {{ $month }}</span></h5>      
                                                        <h6>{{ $reserveStatus['total'] }}</h6>
                                                        {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                            class="text-muted small pt-2 ps-1">decrease</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Total Tempahan Card -->
          
                            <div class="col-md-6 pb-4">
                                <!-- Tempahan Berjaya Card -->
                                <div class="card h-100 info-card sales-card">
                                    <div class="card-body flex-center">
                                        <div class="row">
                                            <div class="col-4 flex-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-check-lg"></i>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <h5 class="card-title">Berjaya <span>| {{ $month }}</span></h5>      
                                                        <h6>{{ $reserveStatus['completed'] }}</h6>
                                                        {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                            class="text-muted small pt-2 ps-1">decrease</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tempahan Berjaya Card -->

                            <!-- Reports -->
                            <div class="col-lg-6 pb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Penempahan Dalam Jabatan <span>| {{ $month }}</span></h5>
                                        
                                        <!-- Line Chart -->
                                        <canvas id="jabatanChart" style="max-height: 400px;"></canvas>
                                        
                                    </div>
                                </div>
                            </div><!-- End Reports -->
                            
                            {{-- Latest Reservation --}}
                            <div class="col-lg-6 pb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Penempahan Dalam Program <span>| {{ $month }}</span></h5>
                                        
                                        <canvas id="programChart" style="max-height: 400px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            {{-- End Latest Reservation --}}
                            <div class="col-md-12 pb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Penempahan Mengikut Hari <span>| {{ $month }}</span></h5>
                                        <canvas id="daysChart" style="max-height: 330px;"></canvas>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div><!-- End Left side columns -->
                    
                  <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Masa Kerap Ditempah <span>| {{ $month }}</span></h5>

                                <div id="reportsChart"></div> {{-- Start Program Chart --}}
                            </div>
                        </div>
                    </div>

                    <div class="pagetitle d-flex justify-content-between align-items-center">
                        <h2>Rekod</h2>
                        <i class="bi bi-list toggle-sidebar-btn d-block d-xl-none"></i>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pelajar <span>| {{ $month }}</span></h5>
                                <div class="mt-4">
                                    <div class="table-responsive">
                                        <table class="table data-table-pelajar table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%;">No Tempahan</th>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pensyarah <span>| {{ $month }}</span></h5>
                                <div class="mt-4">
                                    <div class="table-responsive">
                                        <table class="table data-table-pensyarah table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%;">No Tempahan</th>
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
                            </div>
                        </div>
                    </div>
                </div>
          </section>
          
@endsection
@push('scripts')

<script>

    var element = document.getElementById("laporan");
    element.classList.add("active");
    
    // Time Frequently Reserved
    document.addEventListener("DOMContentLoaded", () => {
        const chartData = {{ Illuminate\Support\Js::from($chartData) }};

        const dates = Object.keys(chartData);
        const timeSlots = Array.from({ length: 9 }, (_, i) => i + 9); // Assuming time slots from 09:00 to 17:00

        const seriesData = timeSlots.map(slot => {
            return {
                name: `${slot}:00 - ${slot + 1}:00`,
                data: dates.map(date => chartData[date][slot] ?? 0)
            };
        });

        
        new ApexCharts(document.querySelector("#reportsChart"), {
            series: seriesData,
            chart: {
                type: 'heatmap',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                type: 'category',
                categories: dates,
                labels: {
                    show: true
                }
            },
            yaxis: {
                type: 'category',
                categories: timeSlots.map(slot => `${slot}:00`),
                labels: {
                    show: true
                }
            },
            colors: ['#008FFB'],
        }).render();

    // Reserved By Jabatan Chart
        const jabatanData = {{ Illuminate\Support\Js::from($jabatan) }};

        console.log("Jabatan : " + jabatanData.jabatan);

        new Chart(document.querySelector('#jabatanChart'), {
        type: 'bar',
        data: {
            labels: jabatanData.jabatan,
            datasets: [{
            label: 'Jabatan',
            data: jabatanData.data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
        });

    // Reserved by Program Chart
        const programData = {{ Illuminate\Support\Js::from($program) }};

        console.log("Program : " + programData.program);

        new Chart(document.querySelector('#programChart'), {
            type: 'bar',
            data: {
            labels: programData.program,
            datasets: [{
                label: 'Program',
                data: programData.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Reserved by day
        const dayData = {{ Illuminate\Support\Js::from($dayData) }};

        console.log(dayData);

        const ctx = document.querySelector('#daysChart').getContext('2d');

        // Create a gradient background color from left to right
        const gradient = ctx.createLinearGradient(0, 0, ctx.canvas.width, 0);
        gradient.addColorStop(0, 'rgba(255, 99, 132, 0.2)'); // Start color (left)
        gradient.addColorStop(1, 'rgba(54, 162, 235, 0.2)'); // End color (right)

        new Chart(ctx, {
            type: 'line',
            data: {
            labels: dayData.date,
            datasets: [{
                label: 'Reservation',
                data: dayData.total,
                backgroundColor: gradient, // Replace with a single color for the background
                borderColor: 'rgba(255, 99, 132, 1)', // Replace with a single color for the border
                borderWidth: 1,
                fill: true, // Enable filling
                tension: 0.4, // Adjust tension for the curve (0-1)
                pointRadius: 2.8, // Hide data points
            }]
            },
            options: {
                // layout: {
                //     padding: 20
                // },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: 10 // Font size for x-axis labels
                            }
                        }
                    },
                    y: {
                        ticks: {
                            font: {
                                size: 10 // Font size for y-axis labels
                            }
                        }
                    }
                },
                plugins: {
                    datalabels: {
                        display: false, // Disable data labels
                        font: {
                            size: 5 // Adjust data label font size
                        }
                    },
                    legend: {
                        display: false, // Hide the legend
                    },
                }
            }
        });

        var tablePelajar = $('.data-table-pelajar').DataTable({
            processing: true,
            serverSide: true,
            ajax: `/admin/bulanan-pelajar-list/${ {{ $monthNo }} }`,
            order: [[0, 'desc']],
            columns: [
                // { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'id', name: 'id'},
                { data: 'namaPengguna', name: 'namaPengguna' },
                { data: 'date', name: 'date', searchable: false },
                { data: 'program', name: 'program', searchable: false },
                { data: 'noMatrik', name: 'noMatrik', searchable: false },
                { data: 'noBilik', name: 'noBilik', searchable: false },
                { data: 'checkin', name: 'checkin', searchable: false },
                { data: 'checkout', name: 'checkout', searchable: false }
            ],
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, 5, 6, 7], className: "text-start" },
            ]
        });

        var tablePensyarah = $('.data-table-pensyarah').DataTable({
            processing: true,
            serverSide: true,
            ajax: `/admin/bulanan-pensyarah-list/${ {{ $monthNo }} }`,
            order: [[0, 'desc']],
            columns: [
                // { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'id', name: 'id'},
                { data: 'namaPengguna', name: 'namaPengguna' },
                { data: 'date', name: 'date' , searchable: false},
                { data: 'jabatan', name: 'jabatan', searchable: false },
                { data: 'noBilik', name: 'noBilik', searchable: false },
                { data: 'checkin', name: 'checkin', searchable: false },
                { data: 'checkout', name: 'checkout', searchable: false }
            ],
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, 5, 6], className: "text-start" },
            ]
        });
    });
    
    // $(function () {
        
    // })

</script>    
@endpush