<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title', 'SINDRAPURA')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/vendor')}}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" 
        rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/css')}}/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('assets/vendor')}}/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <script src="{{asset('assets/vendor')}}/jquery/jquery.min.js"></script>
  <!-- Page Wrapper -->
  <div id="wrapper">
    @include('layout.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        @include('layout.topbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @yield('isi')
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      @include('layout.footer')
    </div>
      <!-- End of Content Wrapper -->
      @include('layout.script')
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  @include('layout.logout')

  <script>
    $(document).ready(function() {
      $('.dt').DataTable();
    });
  </script>

</body>

</html>