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
                                      <h5 class="card-title">Reports <span>/Today</span></h5>

                                      <!-- Line Chart -->
                                      <div id="reportsChart"></div>

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
                                                <th scope="row"><a href="#">MUHAMMAD FAWWAZ BIN AHMED AZMAN</a></th>
                                                <td>A1</td>
                                                <td><a href="#" class="text-primary">2024-3-29</a></td>
                                                <td>15:00:00</td>
                                                <td>17:00:00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">MUHAMMAD FAWWAZ BIN AHMED AZMAN</a></th>
                                                <td>Anjung</td>
                                                <td><a href="#" class="text-primary">2024-3-29</a></td>
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

                            <div id="programChart"></div> {{-- Start Program Chart --}}
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#programChart"), {
                            series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                            }, {
                            name: 'Revenue',
                            data: [11, 32, 45, 32, 34, 52, 41]
                            }, {
                            name: 'Customers',
                            data: [15, 11, 32, 18, 9, 24, 11]
                            }],
                            chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: false
                            },
                            },
                            markers: {
                            size: 4
                            },
                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                            fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                            }
                            },
                            dataLabels: {
                            enabled: false
                            },
                            stroke: {
                            curve: 'smooth',
                            width: 2
                            },
                            xaxis: {
                            type: 'datetime',
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                            },
                            tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                            }
                        }).render();
                        });
                    </script>
                  </div>
          </section>


@endsection
@push('scripts')

<script>
    
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
                    show: false
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
    });
</script>
    <!-- End Line Chart -->
    
@endpush