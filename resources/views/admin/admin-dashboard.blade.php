@extends('admin.admin')
@section('content')
    
    <div class="w-100 d-flex justify-content-end">
        <i class="bi bi-list toggle-sidebar-btn d-block d-xl-none"></i>
    </div>

    <div class="pagetitle d-flex justify-content-between align-items-center">
            <h1>Dashboard</h1>

              {{-- <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
              </nav> --}}
    </div>
          <!-- End Page Title -->

          <section class="section dashboard">
              <div class="row">

                  <!-- Left side columns -->
                  <div class="col-lg-12 pb-4">
                      <div class="row">

                          <!-- Reserved Card -->
                          <div class="col-xxl-4 col-md-6 pb-4">
                              <div class="card info-card sales-card h-100">

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
                                                    <h5 class="card-title">Reserved <span>| This Year</span></h5>      
                                                    <h6>1244</h6>
                                                    {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                        class="text-muted small pt-2 ps-1">decrease</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                              </div>
                          </div>
                          <!-- End Sales Card -->

                          <!-- Revenue Card -->
                          <div class="col-xxl-4 col-md-6 pb-4">
                              <div class="card info-card revenue-card h-100">


                                  <div class="card-body flex-center">
                                    <div class="row">
                                        <div class="col-4 flex-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                              <i class="bi bi-clock-history"></i>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <h5 class="card-title">Pending <span>| This Year</span></h5>      
                                                    <h6>1244</h6>
                                                    {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                        class="text-muted small pt-2 ps-1">decrease</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                          <!-- End Revenue Card -->

                          <!-- Customers Card -->
                          <div class="col-xxl-4 col-xl-12 pb-4">

                              <div class="card info-card customers-card h-100">


                                  <div class="card-body flex-center">
                                    <div class="row">
                                        <div class="col-4 flex-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                              <i class="bi bi-x"></i>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <h5 class="card-title">Cancelled <span>| This Year</span></h5>      
                                                    <h6>1244</h6>
                                                    {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                        class="text-muted small pt-2 ps-1">decrease</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>

                          </div>
                          <!-- End Customers Card -->

                          <!-- Reports -->
                          <div class="col-lg-6">
                              <div class="card h-100">

                                  <div class="card-body">
                                      <h5 class="card-title">Reserved By Jabatan <span>| Today</span></h5>

                                      <!-- Line Chart -->
                                       <canvas id="jabatanChart" style="max-height: 400px;"></canvas>

                                  </div>

                              </div>
                          </div><!-- End Reports -->
                          
                        {{-- Latest Reservation --}}
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Recent Reservation <span>| Today</span></h5>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 150px;">Nama</th>
                                                <th scope="col">Bilik</th>
                                                <th scope="col">Tarikh</th>
                                                <th scope="col">Masuk</th>
                                                <th scope="col">Keluar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">MUHAMMAD FAWWAZ BIN AHMED AZMAN</th>
                                                <td>A1</td>
                                                <td>2024-3-29</td>
                                                <td>15:00:00</td>
                                                <td>17:00:00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">MUHAMMAD FAWWAZ BIN AHMED AZMAN</th>
                                                <td>Anjung</td>
                                                <td>2024-3-29</td>
                                                <td>15:00:00</td>
                                                <td>17:00:00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                         {{-- End Latest Reservation --}}

                      </div>
                  </div><!-- End Left side columns -->

                  <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reserved By Program <span>| Today</span></h5>

                            <canvas id="programChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Time Frequently Reserved <span>| Today</span></h5>

                            <div id="reportsChart"></div> {{-- Start Program Chart --}}
                        </div>
                    </div>

                    <script>
                        
                    </script>
                  </div>
          </section>


@endsection
@push('scripts')

<script>
    
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
            title: {
                text: 'Time Slots Frequently Reserved by Day',
                align: 'center'
            }
        }).render();

    // Reserved By Jabatan Chart
        new Chart(document.querySelector('#jabatanChart'), {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
            label: 'Jabatan',
            data: [65, 59, 80, 81, 56, 55, 40],
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
        }
        });

    // Reserved by Program Chart
        const programData = {{ Illuminate\Support\Js::from($program) }};

        console.log(programData);

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
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
    <!-- End Line Chart -->
    
@endpush