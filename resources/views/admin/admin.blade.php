  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Admin STBPP PMM</title>
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
                  <a class="nav-link {{ request()->is('admin/tempahan') ? 'active' : '' }}" href="{{ route('admin-tempahan') }}">
                      <i class="bi bi-layout-text-window-reverse"></i>
                      <span>Rekod Tempahan</span>
                  </a>
              </li>

              <!-- Log -->
            {{-- <li class="nav-item">
                <a class="nav-link " data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Report</span>
                </a>
                <ul id="report-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="report-general.html" class="active">
                    <i class="bi bi-circle"></i><span>Monthly</span>
                    </a>
                </li>
                <li>
                    <a href="report-data.html">
                    <i class="bi bi-circle"></i><span>Yearly</span>
                    </a>
                </li>
                </ul>
            </li> --}}
          </ul>
          <!-- End Log Nav -->

          <div class="dropup-center dropup">
            <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Pentadbir') }}</button>
            <ul class="dropdown-menu">
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Log Keluar') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        
      </aside><!-- End Sidebar-->

      <main id="main" class="main py-4">
        
        @yield('content')

      </main>

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

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  </body>

  </html>
