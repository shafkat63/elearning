<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>eLearning App - @yield('title')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/student/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/student/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/student/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/student/css/bootstrap-datepicker.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('assets/student/css/style.css') }}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    @yield('nav')
    <!-- Start Main Content -->
    @yield('content')
    <!-- End Main Content -->
  </div>
  <footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
      <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © System Resources Ltd.
        2024</span>
      <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Maintained by <a href="https://srl.com.bd/"
          target="_blank">System Resources Ltd.</a></span>
    </div>
  </footer>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/student/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/student/js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/student/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/student/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/student/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/student/js/misc.js') }}"></script>
  <script src="{{ asset('assets/student/js/settings.js') }}"></script>
  <script src="{{ asset('assets/student/js/todolist.js') }}"></script>
  <script src="{{ asset('assets/student/js/jquery.cookie.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{ asset('assets/student/js/dashboard.js' )}}"></script>
  <!-- End custom js for this page -->
  <!-- endinject -->
  @yield('script')
</body>

</html>