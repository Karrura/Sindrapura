<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SINDRAPURA</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor')}}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css')}}/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image: url(../../image/foto.jpg); background-size: cover">
  <div class="d-flex justify-content-center mt-5 m-3" id="wrapper" style="margin-top: 5%">
    <div class="align-items-center">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h4 font-weight-bold text-primary text-center">
                Sistem Informasi Inderapura Barat
              </div>
              <div class="h4 font-weight-bold text-primary mb-3 text-center">
                Pesisir Selatan
              </div>
              @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                  {{Session::get('success')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @elseif(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                  {{Session::get('error')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              <div class="h4 font-weight-bold text-info mb-2 text-center">
                Login
              </div>
              <form action="{{url('proses-login')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="NIK" name="nik">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                </div>
              </form>
              <hr>
              <div class="font-weight-bold text-dark text-center mb-2" style="font-size: 12px">
                Have no acount?
              </div>
              <a href="{{url('regist')}}" class="btn btn-info btn-user btn-block">
                  Register Account
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor')}}/jquery/jquery.min.js"></script>
    <script src="{{asset('assets/vendor')}}/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor')}}/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js')}}/sb-admin-2.min.js"></script>

</body>

</html>