  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>FYP</title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

      {{-- jquery --}}
      <script src="https://code.jquery.com/jquery.min.js"></script> 
      
      {{-- datatable --}}
      <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
      <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">

      <!-- Scripts -->
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])

      <!-- =======================================================
    * Template Name: NiceAdmin
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Updated: Mar 17 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>

      <!-- ======= Header ======= -->
      {{-- <header id="header" class="header fixed-top d-flex align-items-center">

          <div class="d-flex align-items-center justify-content-between">
              <a href="/admin" class="logo d-flex align-items-center">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">STBPP PMM</span>
              </a>
              <i class="bi bi-list toggle-sidebar-btn"></i>
          </div>
      </header> --}}

      <!-- ======= Sidebar ======= -->
      <!-- dashboard -->
      <aside id="sidebar" class="sidebar d-flex justify-content-between flex-column">

          <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item d-flex justify-content-center align-items-center mt-2 mb-4">
                <a href="/admin" class="logo d-flex align-items-center">
                  <span>STBPP PMM</span>
              </a>
            </li>

              <li class="nav-item">
                  <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="/admin">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->is('admin-tempahan*') ? 'active' : '' }}" href="{{ route('admin-tempahan') }}">
                      <i class="bi bi-grid"></i>
                      <span>Rekod Tempahan</span>
                  </a>
              </li>

              <!-- Log -->
            <li class="nav-item">
                <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Report</span>
                </a>
                <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tables-general.html" class="active">
                        <i class="bi bi-circle"></i><span>Monthly</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Yearly</span>
                        </a>
                    </li>
                </ul>
            </li>
          </ul>
          <!-- End Log Nav -->

          <div class="dropup-center dropup">
              <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Pentadbir
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
          </div>

      </aside><!-- End Sidebar-->

      <main id="main" class="main py-4">
        @yield('content')

          {{-- <div class="pagetitle">
              <h1>Dashboard</h1>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
              </nav>
          </div>
          <!-- End Page Title -->

          <section class="section dashboard">
              <div class="row">

                  <!-- Left side columns -->
                  <div class="col-lg-12">
                      <div class="row">

                          <!-- Sales Card -->
                          <div class="col-xxl-4 col-md-6">
                              <div class="card info-card sales-card">

                                  <div class="filter">
                                      <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                              class="bi bi-three-dots"></i></a>
                                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                          <li class="dropdown-header text-start">
                                              <h6>Filter</h6>
                                          </li>

                                          <li><a class="dropdown-item" href="#">Today</a></li>
                                          <li><a class="dropdown-item" href="#">This Month</a></li>
                                          <li><a class="dropdown-item" href="#">This Year</a></li>
                                      </ul>
                                  </div>

                                  <div class="card-body">
                                      <h5 class="card-title">Sales <span>| Today</span></h5>

                                      <div class="d-flex align-items-center">
                                          <div
                                              class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                              <i class="bi bi-cart"></i>
                                          </div>
                                          <div class="ps-3">
                                              <h6>145</h6>
                                              <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                  class="text-muted small pt-2 ps-1">increase</span>

                                          </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <!-- End Sales Card -->

                          <!-- Revenue Card -->
                          <div class="col-xxl-4 col-md-6">
                              <div class="card info-card revenue-card">

                                  <div class="filter">
                                      <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                              class="bi bi-three-dots"></i></a>
                                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                          <li class="dropdown-header text-start">
                                              <h6>Filter</h6>
                                          </li>

                                          <li><a class="dropdown-item" href="#">Today</a></li>
                                          <li><a class="dropdown-item" href="#">This Month</a></li>
                                          <li><a class="dropdown-item" href="#">This Year</a></li>
                                      </ul>
                                  </div>

                                  <div class="card-body">
                                      <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                      <div class="d-flex align-items-center">
                                          <div
                                              class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                              <i class="bi bi-currency-dollar"></i>
                                          </div>
                                          <div class="ps-3">
                                              <h6>$3,264</h6>
                                              <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                  class="text-muted small pt-2 ps-1">increase</span>

                                          </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <!-- End Revenue Card -->

                          <!-- Customers Card -->
                          <div class="col-xxl-4 col-xl-12">

                              <div class="card info-card customers-card">

                                  <div class="filter">
                                      <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                              class="bi bi-three-dots"></i></a>
                                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                          <li class="dropdown-header text-start">
                                              <h6>Filter</h6>
                                          </li>

                                          <li><a class="dropdown-item" href="#">Today</a></li>
                                          <li><a class="dropdown-item" href="#">This Month</a></li>
                                          <li><a class="dropdown-item" href="#">This Year</a></li>
                                      </ul>
                                  </div>

                                  <div class="card-body">
                                      <h5 class="card-title">Customers <span>| This Year</span></h5>

                                      <div class="d-flex align-items-center">
                                          <div
                                              class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                              <i class="bi bi-people"></i>
                                          </div>
                                          <div class="ps-3">
                                              <h6>1244</h6>
                                              <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                  class="text-muted small pt-2 ps-1">decrease</span>

                                          </div>
                                      </div>

                                  </div>
                              </div>

                          </div>
                          <!-- End Customers Card -->

                          <!-- Reports -->
                          <div class="col-12">
                              <div class="card">

                                  <div class="filter">
                                      <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                              class="bi bi-three-dots"></i></a>
                                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                          <li class="dropdown-header text-start">
                                              <h6>Filter</h6>
                                          </li>

                                          <li><a class="dropdown-item" href="#">Today</a></li>
                                          <li><a class="dropdown-item" href="#">This Month</a></li>
                                          <li><a class="dropdown-item" href="#">This Year</a></li>
                                      </ul>
                                  </div>

                                  <div class="card-body">
                                      <h5 class="card-title">Reports <span>/Today</span></h5>

                                      <!-- Line Chart -->
                                      <div id="reportsChart"></div>

                                      <script>
                                          document.addEventListener("DOMContentLoaded", () => {
                                              new ApexCharts(document.querySelector("#reportsChart"), {
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
                                                      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                                                          "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                                                          "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                                                          "2018-09-19T06:30:00.000Z"
                                                      ]
                                                  },
                                                  tooltip: {
                                                      x: {
                                                          format: 'dd/MM/yy HH:mm'
                                                      },
                                                  }
                                              }).render();
                                          });
                                      </script>
                                      <!-- End Line Chart -->

                                  </div>

                              </div>
                          </div><!-- End Reports -->

                      </div>
                  </div><!-- End Left side columns -->
          </section> --}}

      </main><!-- End #main -->

      <!-- Footer -->
      {{-- <footer id="footer" class="footer">
          <div class="copyright">
              &copy; Copyright <strong><span>GroupAliya</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
              Designed by <a href="https://bootstrapmade.com/">Aliya</a>
          </div>
      </footer> --}}
      <!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
              class="bi bi-arrow-up-short"></i></a>
              
      @stack('scripts')

  </body>

  </html>
