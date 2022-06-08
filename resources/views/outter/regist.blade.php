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
                Buat Akun Baru
              </div>
              <form action="{{url('regist-proses')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">NIK<sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="nik" placeholder="ex: 1234567812345678 / 16 digit pada KTP" required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">Nama<sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="nama" placeholder="ex: Arga Zulsilfa" required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">Password<sup class="text-danger">*</sup></label>
                      <input type="password" class="form-control" name="password" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="col-form-label">Tempat Lahir<sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="ex: Padang" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="col-form-label">Tanggal Lahir<sup class="text-danger">*</sup></label>
                      <input type="date" class="form-control" name="tgl_lahir" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="col-form-label">Jenis Kelamin<sup class="text-danger">*</sup></label>
                      <select required class="form-control" name="jenkel">
                        <option value="">Select Jenis Kelamin</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-laki">Laki-laki</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="col-form-label">Status Perkawinan<sup class="text-danger">*</sup></label>
                      <select required="" class="form-control" id="status" name="stts_perkawinan">
                        <option value="">Select Status Perkawinan</option>
                        <option value="Sudah Kawin">Sudah Kawin</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                      </select>
                    </div>
                  </div>
                </div>  
                {{--<div class="form-group">
                  <label for="message-text" class="col-form-label">Alamat<sup class="text-danger">*</sup></label>
                  <textarea required class="form-control" name="alamat"></textarea>
                </div>--}}
                <div class="row">
                  {{--<div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">Pekerjaan</label>
                      <input type="text" class="form-control" name="pekerjaan" placeholder="ex: PNS/Guru">
                    </div>
                  </div>--}}
                  <div class="col">
                    <div class="form-group">
                      <label class="col-form-label">Pendidikan<sup class="text-danger">*</sup></label>
                      <select required class="form-control" id="status" name="pendidikan">
                        <option value="">Select Pendidikan</option>
                        <option value="SD">SD / Sederajat</option>
                        <option value="SMP">SMP / Sederajat</option>
                        <option value="SMA">SMA / Sederajat</option>
                        <option value="Kuliah">Perguruan Tinggi</option>
                      </select>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="col-form-label">No HP<sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="nohp" placeholder="ex: 6283899196999" required>
                    </div>
                  </div>
                </div>
                {{--<div class="form-group">
                  <label class="col-form-label">Foto</label>
                  <input type="file" class="form-control" name="foto">
                </div>--}}
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
              </form>
              <hr>
              <div class="font-weight-bold text-dark text-center mb-2" style="font-size: 12px">
                Have an acount?
              </div>
              <a href="{{url('/')}}" class="btn btn-info btn-user btn-block">
                  Login
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