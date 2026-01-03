<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Material Dash</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets')}}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets')}}/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/vendors/jvectormap/jquery-jvectormap.css">
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('assets')}}/css/demo/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.png" />
  @yield("css")
</head>
<body>
<script src="{{asset('assets')}}/js/preloader.js"></script>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      @include("layout.erp.partials.sidebar")
    </aside>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
      <header class="mdc-top-app-bar">
        <div class="mdc-top-app-bar__row">
          @include("layout.erp.partials.header")
        </div>
      </header>
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">

        @yield("content")
        </main>

        <!-- partial:partials/_footer.html -->
        <footer>
          <div class="mdc-layout-grid">
          @include("layout.erp.partials.footer")
          </div>
        </footer>
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="{{asset('assets')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('assets')}}/vendors/chartjs/Chart.min.js"></script>
  <script src="{{asset('assets')}}/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="{{asset('assets')}}/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('assets')}}/js/material.js"></script>
  <script src="{{asset('assets')}}/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assets')}}/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- End custom js for this page-->

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {

        $('select').select2();
    });
</script>
  @yield("js")
</body>
</html>
