<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ url('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ url('admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{ url('admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ url('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ url('admin/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('admin/images/favicon.png')}}" />
  @yield('css')
</head>

<body class="with-welcome-text">

  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="../index.html">
          <img src="{{ url('admin/images/logo.svg')}}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="../index.html">
          <img src="{{ url('admin/images/logo-mini.svg')}}" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">Welcome, <span class="text-black fw-bold">{{$user->name}}</span></h1>
          <h3 class="welcome-sub-text">Berikut adalah kesimpulan pekerjaan hari ini </h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item d-none d-lg-block">
          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
            <span class="input-group-addon input-group-prepend border-right">
              <span class="icon-calendar input-group-text calendar-icon"></span>
            </span>
            <input type="text" class="form-control">
          </div>
        </li>
        <li class="nav-item">
          <form class="search-form" action="#">
            <i class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
          </form>
        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="{{ url('admin/images/faces/face8.jpg')}}" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="{{ url('admin/images/faces/face8.jpg')}}" alt="Profile image">
              <p class="mb-1 mt-3 font-weight-semibold">{{$user->name}}</p>
              <p class="fw-light text-muted mb-0">{{$user->email}}</p>
            </div>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
              Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>
              Sign Out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    <div id="right-sidebar" class="settings-panel">
    </div>
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{route('home')}}" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-floor-plan"></i>
            <span class="menu-title">Dashboard</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
        <li class="nav-item nav-category">Produk</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-floor-plan"></i>
            <span class="menu-title">Produk</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('product.create')}}">Tambah Produk</a></li>
              <!-- <li class="nav-item"> <a class="nav-link" href="../pages/ui-features/dropdowns.html">Edit Produk</a></li>
              <li class="nav-item"> <a class="nav-link" href="../pages/ui-features/typography.html">Hapus Produk</a></li> -->
            </ul>
          </div>
        </li>
      </ul>
    </nav>
    <!-- partial -->

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
      <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
    </div>
  </footer>
  <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @section('js')
  <!-- plugins:js -->
  <script src="https://kit.fontawesome.com/faff6b5fb3.js" crossorigin="anonymous"></script>
  <script src="{{url ('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{url ('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{url ('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{url ('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url ('admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{url ('admin/vendors/progressbar.js/progressbar.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url ('admin/js/data-table.js')}}"></script>
  <script src="{{url ('admin/js/dataTables.select.min.js')}}"></script>
  <script src="{{url ('admin/js/off-canvas.js')}}"></script>
  <script src="{{url ('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{url ('admin/js/template.js')}}"></script>
  <script src="{{url ('admin/js/settings.js')}}"></script>
  <script src="{{url ('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url ('admin/js/jquery.cookie.js" type="text/javascript')}}"></script>
  <script src="{{url ('admin/js/dashboard.js')}}"></script>
  <script src="{{url ('admin/js/proBanner.js')}}"></script>
  <!-- <script src="../{{ url('admin/js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
  @yield('js')
  <script>
    $(function() {
      $("#table-overview").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(function() {
      $("#table-product").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(function() {
      $("#table-order").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#table-order .col-md-6:eq(0)');
    });
  </script>
</body>

</html>