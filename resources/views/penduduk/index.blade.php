@extends('layout.master')
@section('title', 'Penduduk - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data Penduduk</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">Profile Nagari</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Penduduk</li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="h5 m-0 font-weight-bold text-dark">Data Penduduk</h6>
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
    	<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus mr-2"></i>Data</button>
      <div class="table-responsive">
        <table class="table table-bordered dt" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
            	<th width="5%">#</th>
              <th width="">Nama</th>
              <th width="25%">NIK</th>
              <th width="20%">Act</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($data as $key => $d)
          	<tr>
              <td>{{$key+1}}</td>
              <td>{{$d->nama}}</td>
              <td>{{$d->nik}}</td>
              <td>
              	<div class="btn-group">
          				<a data-toggle="modal" data-target="#detail{{$d->id}}"><button class="btn btn-outline-success btn-sm mr-2"><i class="fa-solid fa-eye"></i></button></a>

                  <a data-toggle="modal" data-target="#edit{{$d->id}}"><button class="btn btn-outline-warning btn-sm mr-2"><i class="fa-solid fa-pencil"></i></button></a>

                  <a href="#" class="btn btn-outline-danger btn-sm mr-2 swal-delete" data-id="{{$d->id}}" data-ntah="{{$d->nama}}"><i class="fa-solid fa-trash-can"></i></a>
                </div>
              </td>
            </tr>
            <!-- MODAL EDIT -->
            <div class="modal fade" id="edit{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="/penduduk/{{$d->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                            <label class="col-form-label">NIK<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" name="nik" placeholder="ex: 1234567812345678 / 16 digit pada KTP" required value="{{$d->nik}}">
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

            <!-- MODAL DETAIL -->
            <div class="modal fade" id="detail{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="card-content">
                    <div class="modal-header">
                      <label>Detail Penduduk</label>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
                    </div>
                    <div class="card-body">
                      <div class="text-center mb-4"><img src="{{ asset('foto_penduduk/'.$d->foto) }}" alt="Photo" width="50%" height="auto"></div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>NIK</b></h5>
                              <p class="fst-italic">{{$d->nik}}</p>
                            </div>
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>Nama</b></h5>
                              <p class="fst-italic">{{$d->nama}}</p>
                            </div>
                          </div>
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
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          	@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Data Penduduk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/penduduk" method="post" enctype="multipart/form-data">
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
          <div class="form-group">
            <label for="message-text" class="col-form-label">Alamat<sup class="text-danger">*</sup></label>
            <textarea required class="form-control" name="alamat"></textarea>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label class="col-form-label">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" placeholder="ex: PNS/Guru">
              </div>
            </div>
            <div class="col-4">
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
            <div class="col-4">
              <div class="form-group">
                <label class="col-form-label">No HP<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" name="nohp" placeholder="ex: 6283899196999" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label">Foto</label>
            <input type="file" class="form-control" name="foto">
          </div>
          <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
	$('.swal-delete').click(function() {
		var idhapus = $(this).attr('data-id');
		var ntah = $(this).attr('data-ntah');
		swal({
		  title: "Yakin hapus data?",
		  text: "Anda akan menghapus data "+ntah+"!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	window.location = "/penduduk-delete/"+idhapus+"",
		    swal("Data berhasil dihapus!", {
		      icon: "success",
		    });
		  } else {
		    swal("Data batal dihapus!");
		  }
		});
	});
</script>
@endsection