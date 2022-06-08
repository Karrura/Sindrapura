@extends('layout.master')
@section('title', 'User - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data User</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">User</a></li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
  </a>
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
  <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample">
    <!-- DataTales Example -->
    <div class="card-body">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">Data User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="update-tab" data-toggle="tab" href="#update" role="tab" aria-controls="update" aria-selected="false">Update</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
          <div class="card-body mt-4">
            <h5 class="card-title text-primary text-center"><b>{{$d->nama}}</b></h5>
            <h5 class="card-title text-primary text-center text-dark small"><b>{{$d->nik}}</b></h5>
            <div class="text-center mb-4"><img src="{{ asset('foto_penduduk/'.$d->foto) }}" alt="Photo" width="50%" height="auto"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-6">
                    <h5 class="card-title text-primary small"><b>Tempat Lahir</b></h5>
                    <p class="fst-italic">{{$d->tempat_lahir}}</p>
                  </div>
                  <div class="col-6">
                    <h5 class="card-title text-primary small"><b>Tanggal Lahir</b></h5>
                    <p class="fst-italic">{{$d->tgl_lahir}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <h5 class="card-title text-primary small"><b>Jenis Kelamin</b></h5>
                    <p class="fst-italic">{{$d->jenkel}}</p>
                  </div>
                  <div class="col-6">
                    <h5 class="card-title text-primary small"><b>Status Perkawinan</b></h5>
                    <p class="fst-italic">{{$d->stts_perkawinan}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <h5 class="card-title text-primary small"><b>Pekerjaan</b></h5>
                    <p class="fst-italic">{{$d->pekerjaan}}</p>
                  </div>
                  <div class="col-6">
                    <h5 class="card-title text-primary small"><b>Pendidikan</b></h5>
                    <p class="fst-italic">{{$d->pendidikan}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <h5 class="card-title text-primary small"><b>Alamat</b></h5>
                    <p class="fst-italic">{{$d->alamat}}</p>
                  </div>
                  <div class="col-6">
                    <h5 class="card-title text-primary small"><b>No HP</b></h5>
                    <p class="fst-italic">{{$d->nohp}} <a style="color: green" target="_blank" href="https://api.whatsapp.com/send?phone={{ $d->nohp}}" ><i class="fa-brands fa-whatsapp"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">
          <div class="">
            <div class="card-body">
              <form action="/datauser/{{$d->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">NIK<sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="nik" placeholder="ex: 1234567812345678 / 16 digit pada KTP" required readonly value="{{$d->nik}}">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">Nama<sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="nama" placeholder="ex: Arga Zulsilfa" required value="{{$d->nama}}">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">Password<sup class="text-danger">*</sup></label>
                      <input type="password" class="form-control" name="password">
                      <sup class="text-danger">Kosongkan jika tidak diubah!</sup>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="col-form-label">Tempat Lahir<sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="ex: Padang" required value="{{$d->tempat_lahir}}">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="col-form-label">Tanggal Lahir<sup class="text-danger">*</sup></label>
                      <input type="date" class="form-control" name="tgl_lahir" required value="{{$d->tgl_lahir}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="col-form-label">Jenis Kelamin<sup class="text-danger">*</sup></label>
                      <select required class="form-control" name="jenkel">
                        <option value="">Select Jenis Kelamin</option>
                        <option value="Perempuan" {{$d->jenkel == "Perempuan"?'selected':''}}>Perempuan</option>
                        <option value="Laki-laki" {{$d->jenkel == "Laki-laki"?'selected':''}}>Laki-laki</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="col-form-label">Status Perkawinan<sup class="text-danger">*</sup></label>
                      <select required="" class="form-control" name="stts_perkawinan">
                        <option value="">Select Status Perkawinan</option>
                        <option value="Sudah Kawin" {{$d->stts_perkawinan == "Sudah Kawin"?'selected':''}}>Sudah Kawin</option>
                        <option value="Belum Kawin" {{$d->stts_perkawinan == "Belum Kawin"?'selected':''}}>Belum Kawin</option>
                      </select>
                    </div>
                  </div>
                </div>  
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Alamat<sup class="text-danger">*</sup></label>
                  <textarea required class="form-control" name="alamat">{{$d->alamat}}</textarea>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">Pekerjaan</label>
                      <input type="text" class="form-control" name="pekerjaan" placeholder="ex: PNS/Guru" value="{{$d->pekerjaan}}">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">Pendidikan<sup class="text-danger">*</sup></label>
                      <select required class="form-control" id="status" name="pendidikan">
                        <option value="">Select Pendidikan</option>
                        <option value="SD" {{$d->pendidikan == "SD"?'selected':''}}>SD / Sederajat</option>
                        <option value="SMP" {{$d->pendidikan == "SMP"?'selected':''}}>SMP / Sederajat</option>
                        <option value="SMA" {{$d->pendidikan == "SMA"?'selected':''}}>SMA / Sederajat</option>
                        <option value="Kuliah" {{$d->pendidikan == "Kuliah"?'selected':''}}>Perguruan Tinggi</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="col-form-label">No HP<sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="nohp" placeholder="ex: 6283899196999" required value="{{$d->nohp}}">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Foto</label>
                  <input type="file" class="form-control" name="foto">
                  <sup class="text-danger">Kosongkan jika tidak diubah!</sup>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
     </div>
  </div>
</div>
@endsection